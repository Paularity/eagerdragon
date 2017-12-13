<?php

namespace App;

use App\User;
use App\Processor;
use Illuminate\Database\Eloquent\Model;

class MerchantGatewayFees extends Model
{
    protected $fillable = [
    	'merchant_id', 'processor_id', 
    	'setup_fee', 'monthly_fee', 'transaction_fee'
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
