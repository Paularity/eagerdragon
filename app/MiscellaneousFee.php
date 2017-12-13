<?php

namespace App;

use App\User;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class MiscellaneousFee extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'processor_id', 'setup', 'monthly_1', 'monthly_2',
        'transaction_1', 'transaction_2',
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
