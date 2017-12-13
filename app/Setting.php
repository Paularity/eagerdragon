<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Setting extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'meta_key', 'meta_value',
    ];
}
