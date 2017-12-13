<?php

namespace App;

use App\User;
use App\Chargeback;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SupportingDocs extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'filename', 'user_id', 'chargeback_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chargeback()
    {
        return $this->belongsTo(Chargeback::class, 'chargeback_id');
    }
}
