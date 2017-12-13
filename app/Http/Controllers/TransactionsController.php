<?php

namespace App\Http\Controllers;

use Zttp\Zttp;
use Zttp\ZttpResponse;
use App\User;
use App\Customer;
use App\Chargeback;
use App\Variables;
use App\Transaction;
use App\Processor;
use App\TransactionPostFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerTransactionReceipt;
use App\Http\Requests\CreateTransactionRequest;
use Illuminate\Contracts\Encryption\DecryptException;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = User::whereHas('roles', function ($q) {
            $q->where('name', 'merchant');
        })->get();

        $this->setTemplateVars();

        return view('transaction.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTemplateVars();

        return view('transaction.create');
    }

    public function createCustom($amount, $merchant, $redirect)
    {
        $data = [
            'amount' => $amount,
            'merchant_id' => $merchant,
            'redirect_url' => $redirect,
        ];

        $this->setTemplateVars();

        return view('transaction.createCustom', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $merchant = User::findOrFail($request->merchant_id);
        foreach ($merchant->merchantAccount->processors as $value) {
            if ($value['id'] == $request->processor_id) {
                $merchProc = $value['pivot'];
            }
        }

        $data = $request->except([
            'credit_card_cvv',
        ]);
        $ccNumber = str_replace(' ', '', $request->credit_card_number);
        $data['payment_method'] = $merchProc['payment_method'];
        $data['transaction_type'] = $merchProc['transaction_type'];
        $data['acquire_type'] = $merchProc['acquire_type'];
        $data['api_url_production'] = $merchProc['api_url_production'];
        $data['api_url_testing'] = $merchProc['api_url_testing'];
        $data['api_key'] = $merchProc['api_key'];
        $data['api_secret'] = $merchProc['api_secret'];
        $data['api_token'] = $merchProc['api_token'];
        $data['routing'] = $merchProc['routing'];
        $data['rebill_routing'] = $merchProc['rebill_routing'];
        $data['is_for_moto'] = $merchProc['is_for_moto'];
        $data['credit_card_type'] = (new Transaction())
            ->getCCType($ccNumber);
        $data['credit_card_number'] = encrypt($ccNumber);
        $data['credit_card_number_last_four'] = substr($ccNumber, -4);
        $data['credit_card_key'] = env('CC_KEY');
        $data['credit_card_expiration_year'] = encrypt(
            $request->credit_card_expiration_year);
        $data['credit_card_expiration_month'] = encrypt(
            $request->credit_card_expiration_month);

        $processor = Processor::findOrFail($merchProc['processor_id']);

        if ($processor['name'] === 'authorize.net') {
            $processorResponse = $this->authNet( $merchProc, $request->all() );
            $data['processor_response'] = json_encode($processorResponse['res']);
            $data['reference_id'] = $processorResponse['reference_id'];
        }

        $transaction = Transaction::create($data);

        #Save customer cc key
        $customer = Customer::findOrFail($request->customer_id);
        if (empty($customer->cc_key)) {
            $customer->cc_key = encrypt(
                $request->customer_id.','.
                $data['credit_card_number_last_four'].','.
                $data['credit_card_expiration_year'].','.
                $data['credit_card_expiration_month']
            );
            $customer->save();
        }

        #Save transaction post fields sales
        $this->postFields($data, $transaction->id, $merchProc, 'sale');

        #Send email to customer if transaction is accepted
        Mail::to($customer)->send(new CustomerTransactionReceipt($transaction));

        return redirect()->back()->with('success', 'Transaction was successful!');
    }

    public function customStore(Request $request)
    {
        $data = $request->except([
            'credit_card_cvv',
            'redirect_url',
        ]);

        $data['payment_method'] = 'sale';
        $data['transaction_type'] = 'authorize-capture';
        $data['credit_card_number'] = encrypt($request->credit_card_number);
        $data['credit_card_number_last_four'] = str_replace(' ', '',
            substr($request->credit_card_number, 14));

        $data['credit_card_expiration_year'] = encrypt(
            $request->credit_card_expiration_year);
        $data['credit_card_expiration_month'] = encrypt(
            $request->credit_card_expiration_month);
        Transaction::create($data);

        return redirect('http://'.$request->redirect_url);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction['cctype'] = (new Transaction())->getCCType(
            str_replace(' ', '', decrypt($transaction->credit_card_number))
        );

        $histories = Transaction::where(
            'customer_id',
                    $transaction->customer_id
        )->paginate(10);

        return view('transaction.show', compact('transaction', 'histories'));
    }

    public function search(Request $request)
    {
        if ($request->merchant_id !== 'all') {
            $transaction = Transaction::where('merchant_id',
                $request->merchant_id)
                    ->where('processor_id', $request->processor_id);
        } else {
            $transaction = Transaction::where('merchant_id', '!=', 'all');
        }

        if (!empty($request->period_start_date) &&
            !empty($request->period_end_date)) {
            $transaction->whereBetween(
                'created_at',
                    [date('Y-m-d h:i:s', strtotime($request->period_start_date)),
                    date('Y-m-d h:i:s', strtotime($request->period_end_date)), ]
            );
        }

        if (!empty($request->min_amount_range) &&
            !empty($request->max_amount_range)) {
            $transaction->whereBetween(
                'amount',
                [$request->min_amount_range, $request->max_amount_range]
            );
        }

        if (!empty($request->transaction_id)) {
            $transaction->where('id', $request->transaction_id);
        }

        if (!empty($request->order_id)) {
            $transaction->where('order_id', $request->order_id);
        }

        if (!empty($request->credit_card_number_last_four)) {
            $transaction->where(
                'credit_card_number_last_four',
                $request->credit_card_number_last_four
            );
        }

        if ('all' != $request->payment_method) {
            $transaction->where('payment_method', $request->payment_method);
        }

        if ('all' != $request->transaction_type) {
            $transaction->where('transaction_type', $request->transaction_type);
        }

        if (0 != $request->transaction_status) {
            $transaction->where('status', $request->transaction_status);
        }

        $transactions = $transaction->paginate(10);

        return view('transaction.search', compact('transactions'));
    }

    public function refund(Request $request)
    {
        $transaction = Transaction::findOrFail($request->id);

        $data['customer_id'] = $transaction->customer_id;
        $data['merchant_id'] = $transaction->merchant_id;
        $data['processor_id'] = $transaction->processor_id;
        $data['environment'] = $transaction->environment;
        $data['firstname'] = $transaction->firstname;
        $data['lastname'] = $transaction->lastname;
        $data['email'] = $transaction->email;
        $data['phone'] = $transaction->phone;
        $data['address1'] = $transaction->address1;
        $data['address2'] = $transaction->address2;
        $data['city'] = $transaction->city;
        $data['us_state'] = $transaction->us_state;
        $data['zippostal_code'] = $transaction->zippostal_code;
        $data['country'] = $transaction->country;
        $data['credit_card_type'] = $transaction->credit_card_type;
        $data['credit_card_number'] = decrypt($transaction->credit_card_number);
        $data['credit_card_expiration_month'] = decrypt($transaction->credit_card_expiration_month);
        $data['credit_card_expiration_year'] = decrypt($transaction->credit_card_expiration_year);
        $data['credit_card_number_last_four'] = $transaction->credit_card_number_last_four;
        $data['credit_card_key'] = env('CC_KEY');
        $data['payment_method'] = 'refund';
        $data['transaction_type'] = 'auth';

        $data['original_transaction_id'] = $request->id;
        $data['amount'] = $request->amount;
        $data['tax'] = $request->tax;
        $data['currency'] = $request->currency;

        $processor = Processor::find($transaction->processor_id);
        if ($processor->name === 'authorize.net') {
            $processorResponse = $this->authNetRefund($data, $transaction);
        }

        $trans = Transaction::create($data);

        //Chargebacks
        $cbData = [
            'merchant_id' => $data['merchant_id'],
            'processor_id' => $data['processor_id'],
            'date' => \Carbon\Carbon::now(),
            'amount' => $request->amount,
            'sale_date' => $transaction->created_at,
            'sale_value' => $transaction->amount,
            'sale_transaction_id' => $trans->id,
            'credit_card_type' => $transaction->credit_card_type,
            'credit_card_number' => '*****'.$transaction->credit_card_number_last_four,
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'dispute_result' => '0000',
        ];

        Chargeback::create($cbData);

        $this->postFields($data, $request->id, $transaction->merchant, 'refund');

        return redirect()->back()->with('success', 'Refund was successful!');
    }

    public function merchant(Request $request)
    {
        $merchant = User::findOrFail($request['id']);

        return $merchant->merchantAccount->processors;
    }

    public function postFields( $data, $id, $merchProc, $method )
    {
        $data['transaction_id'] = $id;
        $data['payment_method'] = $method;
        $data['username'] = $merchProc->username;
        $data['password'] = $merchProc->password;
        $data['post_url'] = null;
        $data['redirect_url'] = null;
        $data['merchant_website'] = null;

        TransactionPostFields::create($data);
    }

    public function authNet( $mp, $dt )
    {
        // Common setup for API credentials  
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();   
        $merchantAuthentication->setName($mp['api_key']);   
        $merchantAuthentication->setTransactionKey($mp['api_secret']);   
        $refId = 'ref' . time();

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber(str_replace(' ', '', $dt['credit_card_number']));
        $creditCard->setExpirationDate(
        $dt['credit_card_expiration_year'].'-'.$dt['credit_card_expiration_month']);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($dt['order_id']);
        $order->setDescription($dt['order_description']);

        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($dt['firstname']);
        $customerAddress->setLastName($dt['lastname']);
        $customerAddress->setAddress($dt['address1']);
        $customerAddress->setCity($dt['city']);
        $customerAddress->setState($dt['us_state']);
        $customerAddress->setZip($dt['zippostal_code']);
        $customerAddress->setCountry($dt['country']);


        // Create a transaction
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($dt['amount']);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setBillTo($customerAddress);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId( $refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

        if ($response != null) 
        {
          $tresponse = $response->getTransactionResponse();

          if (($tresponse != null) && ($tresponse->getResponseCode()=="1"))
          {
              $res = [
                'AUTH_CODE' => $tresponse->getAuthCode(),
                'TRANS_ID' => $tresponse->getTransId(),
              ];
          }
          else
          {
            $res = [
                'ERROR_CODE' => $tresponse->getErrors()[0]->getErrorCode(),
                'ERROR_MESSAGE' => $tresponse->getErrors()[0]->getErrorText()
            ];
          }
        }  
        else
        {
            $res = [
                'ERROR_MESSAGE' => 'No response returned.'
            ];
        }

        $result = [
            'reference_id' => $refId,
            'res' => $res
        ];
        return $result;
    }

    public function authNetRefund( $data, $trans )
    {
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($trans['api_key']);
        $merchantAuthentication->setTransactionKey($trans['api_secret']);

        // Set the transaction's refId
        $refId = 'ref' . time();
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($data['credit_card_number']);
        $creditCard->setExpirationDate(
            $data['credit_card_expiration_year'].'-'.
            $data['credit_card_expiration_month']
        );
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);
        //create a transaction
        $transactionRequest = new AnetAPI\TransactionRequestType();
        $transactionRequest->setTransactionType( "refundTransaction"); 
        $transactionRequest->setAmount($data['amount']);
        $transactionRequest->setPayment($paymentOne);
     
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest( $transactionRequest);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);

        if ($response != null)
        {
            $tresponse = $response->getTransactionResponse();
            
            if ($tresponse != null && $tresponse->getMessages() != null)   
            {
                $res = [
                    'AUTH_CODE' => $tresponse->getMessages()[0]->getCode(),
                    'TRANS_ID' => $tresponse->getTransId()
                ];
            }
            else
            {
                if($tresponse->getErrors() != null)
                {
                    $res = [
                        'ERROR_MESSAGE' => $tresponse->getErrors()[0]->getErrorText()
                    ];
                }
            }
        }
        else
        {
            $res = [
                'ERROR_MESSAGE' => "No response returned \n"
            ];
        }
        $result = [
            'reference_id' => $refId,
            'res' => $res
        ];
        return $result;
    }

    private function setTemplateVars()
    {
        $variables = new Variables();
        $paymentMethod = $variables->getPaymentMethods();
        $transactionType = $variables->getTransactionTypes();
        $expirationMonth = $variables->getExpirationMonth();

        \View::share('paymentMethod', $paymentMethod);
        \View::share('transactionType', $transactionType);
        \View::share('expirationMonth', $expirationMonth);
    }
}
