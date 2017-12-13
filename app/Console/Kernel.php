<?php

namespace App\Console;

use DB;
use App\User;
use App\Transaction;
use App\MonthlyFees;
use App\AntiFraudFee;
use App\GatewayFee;
use App\MerchantGatewayFees;
use App\MerchantAccount;
use App\BillingSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        #Delete users who are inactive
        $schedule->call(function() {
            DB::delete('delete from users where status = 2');
        })->quarterly();

        #Charge a merchant monthly
        $schedule->call(function() {
            $merchants = User::whereHas('roles', function($q){
                $q->where('name', 'merchant');
            })->get();
            foreach ($merchants as $key => $value) {
                $processors = $value->merchantAccount->processors;

                foreach ($processors as $process) {
                    $merchant = MerchantAccount::findOrFail(
                        $process->pivot['merchant_account_id']);
                    $transaction = Transaction::where('merchant_id', $merchant->user['id'])
                        ->where('processor_id', $process->id)
                        ->whereBetween('created_at', [
                            date('Y-m-01', strtotime('today')),
                            date('Y-m-t', strtotime('today'))
                        ])
                        ->get();
                    foreach ($transaction as $trans) {
                        if ($trans['payment_method'] === 'sale') {
                            $amount_sale[$trans->processor_id][] = (.1 * $trans->amount);
                        } else {
                            $amount_refund[$trans->processor_id][] = (.1 * $trans->amount);
                        }
                    }
                    if (!empty($amount_sale)) {
                        $data = [
                            'merchant_id' => $merchant->user['id'],
                            'processor_id' => $process->id,
                            'fee_type' => 'sale_fee',
                            'total_transaction_charge' => array_sum($amount_sale[$process->id]),
                        ];
                        MonthlyFees::create($data);
                    }
                    if (!empty($amount_refund)) {
                        $data = [
                            'merchant_id' => $merchant->user['id'],
                            'processor_id' => $process->id,
                            'fee_type' => 'refund_fee',
                            'total_transaction_charge' => array_sum($amount_refund[$process->id]),
                        ];
                        MonthlyFees::create($data);
                    }
                }
            }

            #Fees
            $antiFraudFees = AntiFraudFee::all();

            foreach ($antiFraudFees as $aff) {
                $data = [
                    'merchant_id' => $aff['user_id'],
                    'processor_id' => $aff['processor_id'],
                    'fee_type' => 'anti-fraud-fee',
                    'total_transaction_charge' => $aff['monthly']
                ];
                #Charge HERE
                MonthlyFees::create($data);
            }

            $gatewayFees = GatewayFee::all();

            foreach ($gatewayFees as $gf) {
                $data = [
                    'merchant_id' => $gf['user_id'],
                    'processor_id' => $gf['processor_id'],
                    'fee_type' => 'gateway-fee',
                    'total_transaction_charge' => $gf['monthly']
                ];
                MonthlyFees::create($data);
            }

            $bankFees = BankFee::all();

            foreach ($bankFees as $bf) {
                $data = [
                    'merchant_id' => $bf['user_id'],
                    'processor_id' => $bf['processor_id'],
                    'fee_type' => 'bank-fee',
                    'total_transaction_charge' => $bf['monthly']                
                ];
                MonthlyFees::create($data);
            }
        })->monthly();

        $schedule->call(function() {
            $billSched = BillingSchedule::all();

            foreach ($billSched as $key => $bs) {
                if (
                        $bs['billing_per_week'] == 1 &&
                        $bs['billing_period_1_starts_on'] == lcfirst(date('l'))
                    ) {
                    $antiFraudFees = $this->antiFraudFees($bs);
                    foreach ($antiFraudFees as $aff) {
                        #Charge HERE or Save it to DB
                    }

                    $gatewayFees = $this->gatewayFees($bs);
                    foreach ($gatewayFees as $gf) {
                        $data = [
                            'merchant_id' => $gf['user_id'],
                            'processor_id' => $gf['processor_id'],
                            'transaction_fee' => $gf['transaction']
                        ];
                        MerchantGatewayFees::create($data);
                    }

                    $bankFees = $this->bankFees($bs);
                    foreach ($bankFees as $bf) {
                        $data = [
                            'merchant_id' => $bf['user_id'],
                            'processor_id' => $bf['processor_id'],
                            'transaction_fee' => $bf['transaction'],
                            'authorization_fee' => $bf['authorization'],
                            'capture_fee' => $bf['capture'],
                            'sale_fee' => $bf['sale'],
                            'decline_fee' => $bf['decline'],
                            'refund_fee' => $bf['refund'],
                            'chargeback_1_fee' => $bf['chargeback1'],
                            'chargeback_2_fee' => $bf['chargeback2'],
                            'chargeback_threshold_fee' => $bf['chargeback_threshold'],
                            'discount_rate_fee' => $bf['discount_rate'],
                            'avs_premium_fee' => $bf['avs_premium'],
                            'cvv_premium_fee' => $bf['cvv_premium'],
                            'interregional_premium_fee' => $bf['interregional_premium'],
                            'wire_fee' => $bf['wire'],
                            'reserve_rate_fee' => $bf['reserve_rate'],
                            'reserve_period_months' => $bf['reserve_period'],
                            'initial_reserve' => $bf['initial_reserve'],
                            'setup_fee' => $bf['setup']
                        ];
                        MerchantBankFees::create($data);
                    }

                }
                if ($bs['billing_per_week'] == 2) {
                    if (
                            $bs['billing_period_1_starts_on'] == 
                            $bs['billing_period_2_starts_on']
                        ) {

                        #AntiFraud Charge
                        $antiFraudFees = $this->antiFraudFees($bs);
                        foreach ($antiFraudFees as $aff) {
                            for ($i=0; $i < 2; $i++) { 
                                #Charge HERE or Save it to DB
                            }
                        }

                        #Gateway Charge
                        $gatewayFees = $this->gatewayFees($bs);
                        foreach ($gatewayFees as $gf) {
                            for ($i=0; $i < 2; $i++) { 
                                $data = [
                                    'merchant_id' => $gf['user_id'],
                                    'processor_id' => $gf['processor_id'],
                                    'transaction_fee' => $gf['transaction']
                                ];
                                MerchantGatewayFees::create($data);
                            }
                        }

                        $bankFees = $this->bankFees($bs);
                        foreach ($bankFees as $bf) {
                            for ($i=0; $i < 2; $i++) {
                                $data = [
                                    'merchant_id' => $bf['user_id'],
                                    'processor_id' => $bf['processor_id'],
                                    'transaction_fee' => $bf['transaction'],
                                    'authorization_fee' => $bf['authorization'],
                                    'capture_fee' => $bf['capture'],
                                    'sale_fee' => $bf['sale'],
                                    'decline_fee' => $bf['decline'],
                                    'refund_fee' => $bf['refund'],
                                    'chargeback_1_fee' => $bf['chargeback1'],
                                    'chargeback_2_fee' => $bf['chargeback2'],
                                    'chargeback_threshold_fee' => $bf['chargeback_threshold'],
                                    'discount_rate_fee' => $bf['discount_rate'],
                                    'avs_premium_fee' => $bf['avs_premium'],
                                    'cvv_premium_fee' => $bf['cvv_premium'],
                                    'interregional_premium_fee' => $bf['interregional_premium'],
                                    'wire_fee' => $bf['wire'],
                                    'reserve_rate_fee' => $bf['reserve_rate'],
                                    'reserve_period_months' => $bf['reserve_period'],
                                    'initial_reserve' => $bf['initial_reserve'],
                                    'setup_fee' => $bf['setup']
                                ];

                                MerchantBankFees::create($data);
                            }
                        }
                    } else {
                        if (
                                $bs['billing_period_1_starts_on'] == lcfirst(date('l')) ||
                                $bs['billing_period_2_starts_on'] == lcfirst(date('l'))
                            ) {
                            $antiFraudFees = $this->antiFraudFees($bs);
                            foreach ($antiFraudFees as $aff) {
                                #Charge HERE or Save it to DB
                            }

                            $gatewayFees = $this->gatewayFees($bs);
                            foreach ($gatewayFees as $gf) {
                                $data = [
                                    'merchant_id' => $gf['user_id'],
                                    'processor_id' => $gf['processor_id'],
                                    'transaction_fee' => $gf['transaction']
                                ];
                                MerchantGatewayFees::create($data);
                            }

                            $bankFees = $this->bankFees($bs);
                            foreach ($bankFees as $bf) {
                                $data = [
                                    'merchant_id' => $bf['user_id'],
                                    'processor_id' => $bf['processor_id'],
                                    'transaction_fee' => $bf['transaction']
                                ];
                                MerchantBankFees::create($data);
                            }
                        }
                    }
                }
            }
        })->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

    public function antiFraudFees( $data )
    {
        return AntiFraudFee::where('user_id', $data['user_id'])
                ->where('processor_id', $data['processor_id'])
                ->get();
    }

    public function gatewayFees( $data )
    {
        return GatewayFee::where('user_id', $data['user_id'])
                ->where('processor_id', $data['processor_id'])
                ->get();
    }

    public function bankFees( $data )
    {
        return BankFee::where('user_id', $data['user_id'])
                ->where('processor_id', $data['processor_id'])
                ->get();        
    }
}
