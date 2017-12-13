<?php

namespace App;

use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Bank extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id','name', 'account_no', 'routing_no', 'legal_name', 'business_type', 'tax_id'
    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'banks';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
