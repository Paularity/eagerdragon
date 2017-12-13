<?php

namespace App;

use App\User;
use OwenIt\Auditing\auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\auditable;

class BillingSchedule extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'processor_id', 'billing_per_week', 'billing_period_1_starts_on',
        'billing_period_2_starts_on', 'time_to_settle',
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
