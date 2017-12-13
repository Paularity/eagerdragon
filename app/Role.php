<?php

namespace App;

use App\Events\CrudNotification;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = ['name', 'title', 'level'];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id', 'updated_at',
    ];
}
