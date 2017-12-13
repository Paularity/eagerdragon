<?php

namespace App;

use App\User;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AccessCode extends Model implements Auditable
{
    use AuditableTrait;
    protected $fillable = ['userId', 'code'];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function setCodeAttribute($value)
    {
        if (!$value) {
            $value = mt_rand(000000, 999999);
        }

        $this->attributes['code'] = $value;
    }
}
