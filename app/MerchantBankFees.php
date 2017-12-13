<?php

namespace App;

use App\User;
use App\Processor;
use Illuminate\Database\Eloquent\Model;

class MerchantBankFees extends Model
{
    protected $fillable = [
    	'merchant_id', 'processor_id', 'mid', 
    	'transaction_fee', 'authorization_fee', 'capture_fee',
    	'sale_fee', 'decline_fee', 'refund_fee',
    	'chargeback_1_fee', 'chargeback_2_fee', 'chargeback_threshold_fee',
    	'discount_rate_fee', 'avs_premium_fee', 'cvv_premium_fee',
    	'interogional_premium_fee', 'wire_fee', 'reserve_rate_fee',
    	'reserve_period_months', 'initial_reserve', 'setup_fee',
    	'monthly_fee'
    ];

    public function merchant(  )
    {
    	return $this->belongsTo(User::class, 'merchant_id');
    }

    public function processor(  )
    {
    	return $this->belongsTo(Processor::class, 'processor_id');
    }

}