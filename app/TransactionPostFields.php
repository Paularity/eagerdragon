<?php

namespace App;

use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class TransactionPostFields extends Model
{
    protected $fillable = [
    	'transaction_id', 'username', 'password', 'firstname', 'lastname',
    	'company', 'email', 'phone', 'address1', 'address2', 'city',
    	'us_state', 'country', 'zippostal_code', 'customer_ip',
    	'shipping_firstname', 'shipping_lastname', 'shipping_company', 
    	'shipping_email', 'shipping_phone', 'shipping_address1', 
    	'shipping_address2', 'shipping_city', 'shipping_us_state', 
    	'shipping_country', 'shipping_zippostal_code',
    	'order_id', 'order_description', 'amount', 'tax', 
        'credit_card_number', 'credit_card_number_last_four',
        'credit_card_expiration_year', 'credit_card_expiration_month',
        'post_url', 'redirect_url', 'merchant_website', 'payment_method'
    ];

    public function transaction(  )
    {
    	return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
