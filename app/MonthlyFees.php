<?php

namespace App;

use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class MonthlyFees extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'merchant_id', 'processor_id', 'fee_type', 'monthly_fee',
        'bank_fee', 'bank_setup', 'gateway_setup', 'misc_setup',
        'total_transaction_charge',
    ];
}
