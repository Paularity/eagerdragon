<?php

namespace App;

use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class GatewayFee extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'processor_id', 'setup', 'monthly', 'transaction',
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
