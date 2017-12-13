<?php

namespace App;

use App\User;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class BankFee extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'processor_id', 'transaction', 'authorization', 'capture',
        'sale', 'refund', 'chargeback1', 'chargeback2', 'chargeback_threshold',
        'discount_rate', 'avs_premium', 'cvv_premium', 'interregional_premium',
        'wire', 'reserve_rate', 'reserve_period', 'initial_reserve', 'setup',
        'monthly', 'decline',
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
