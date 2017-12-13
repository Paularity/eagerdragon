<?php

namespace App;

use App\Events\Notif;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Language extends Model implements Auditable
{
    use AuditableTrait;

    protected $table;
    protected $fillable = ['foldername', 'languagename', 'description','flag_name'];

    protected $events = [
        'updated' => Notif::class
    ];
}
