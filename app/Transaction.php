<?php

namespace App;

use App\User;
use App\Customer;
use App\TransactionPostFields;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Transaction extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'customer_id', 'merchant_id', 'processor_id', 'environment',
        'original_transaction_id', 'firstname', 'lastname', 'email',
        'phone', 'address1', 'address2', 'city', 'us_state',
        'zippostal_code', 'country', 'credit_card_type',
        'credit_card_number', 'credit_card_number_last_four',
        'credit_card_expiration_year', 'credit_card_expiration_month',
        'payment_method', 'transaction_type', 'acquire_type',
        'routing', 'rebill_routing', 'authorization_code',
        'api_url_production', 'api_url_testing', 'api_key',
        'api_secret', 'api_token',
        'amount', 'tax', 'currency', 'order_id', 'order_description',
        'shipping_firstname', 'shipping_lastname', 'shipping_email',
        'shipping_phone', 'shipping_address1', 'shipping_address2', 
        'shipping_city', 'shipping_us_state','shipping_zippostal_code', 
        'shipping_country', 'status', 'is_for_moto', 'credit_card_key',
        'transaction_id', 'processor_response', 'reference_id'
    ];

    protected $hidden = [
        'credit_card_number','credit_card_expiration_year', 
        'credit_card_expiration_month',
    ];

    public function merchant()
    {
    	return $this->belongsTo(User::class, 'merchant_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function virtualTerminal()
    {
        return $this->belongsTo(VirtualTerminal::class);
    }

    public function postFields(  )
    {
        return $this->hasMany(TransactionPostFields::class);
    }
    public function getCCType($CCNumber)
    {
        $creditcardTypes = [
            ['Name'=>'American Express',
                'cardLength'=>[15],
                'cardPrefix'=>['34', '37']],
            ['Name'=>'Maestro',
                'cardLength'=>[12, 13, 14, 15, 16, 17, 18, 19],
                'cardPrefix'=>['5018', '5020', '5038', '6304',
                '6759', '6761', '6763']],
            ['Name'=>'Mastercard',
                'cardLength'=>[16],
                'cardPrefix'=>['51', '52', '53', '54', '55']],
            ['Name'=>'Visa',
                'cardLength'=>[13,16],
                'cardPrefix'=>['4']],
            ['Name'=>'JCB',
                'cardLength'=>[16],
                'cardPrefix'=>['3528', '3529', '353', '354',
                '355', '356', '357', '358']],
            ['Name'=>'Discover',
                'cardLength'=>[16],
                'cardPrefix'=>['6011', '622126', '622127', '622128',
                '622129', '62213','62214', '62215', '62216', '62217',
                '62218', '62219','6222', '6223', '6224', '6225', '6226',
                '6227', '6228','62290', '62291', '622920', '622921',
                '622922', '622923','622924', '622925', '644', '645',
                '646', '647', '648','649', '65']],
            ['Name'=>'Solo',
                'cardLength'=>[16, 18, 19],
                'cardPrefix'=>['6334', '6767']],
            ['Name'=>'Unionpay',
                'cardLength'=>[16, 17, 18, 19],
                'cardPrefix'=>['622126', '622127', '622128', '622129',
                '62213', '62214', '62215', '62216', '62217', '62218',
                '62219', '6222', '6223', '6224', '6225', '6226', '6227',
                '6228', '62290', '62291', '622920', '622921', '622922',
                '622923', '622924', '622925']],
            ['Name'=>'Diners Club',
                'cardLength'=>[14],
                'cardPrefix'=>['300', '301', '302', '303', '304', '305', '36']],
            ['Name'=>'Diners Club US',
                'cardLength'=>[16],
                'cardPrefix'=>['54', '55']],
            ['Name'=>'Diners Club Carte Blanche',
                'cardLength'=>[14],
                'cardPrefix'=>['300','305']],
            ['Name'=>'Laser',
                'cardLength'=>[16, 17, 18, 19],
                'cardPrefix'=>['6304', '6706', '6771', '6709']],
        ];
        $CCNumber= trim($CCNumber);
        $type='Unknown';
        foreach ($creditcardTypes as $card) {
            if (! in_array(strlen($CCNumber), $card['cardLength'])) {
                continue;
            }
            $prefixes = '/^('.implode('|', $card['cardPrefix']).')/';
            if (preg_match($prefixes, $CCNumber) == 1) {
                $type= $card['Name'];
                break;
            }
        }
        return $type;
    }
}
