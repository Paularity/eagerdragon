<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Customer extends Model implements Auditable
{
    use AuditableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merchant_id', 'firstname', 'lastname', 'address', 'email', 'phone',
        'address1', 'address2', 'city', 'us_state', 'zippostal_code',
        'timezone', 'country',
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id', 'merchant_id', 'updated_at',
    ];

    public function merchant()
    {
        return $this->belongsTo('App\User', 'merchant_id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
