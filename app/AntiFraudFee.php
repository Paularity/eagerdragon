<?php

namespace App;

use App\User;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AntiFraudFee extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'processor_id', 'setup', 'monthly', 'transaction',
        'rebill_transaction',
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
