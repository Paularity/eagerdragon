<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class AgentAccount extends Model implements AuditableContract
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'account_number', 'legal_name', 'swift_routing_number',
        'tax_id', 'business_type', 'business_name', 'address1',
        'address2', 'zippostal_code', 'country', 'website', 'us_state',
        'city', 'timezone', 'cs_firstname', 'cs_lastname',
        'cs_phone', 'cs_email', 'created_by',
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id', 'user_id', 'updated_at',

    ];


    public function getFillableFields()
    {
        return $this->fillable;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function agentCSRs()
    {
        return $this->hasMany('App\AgentCSR');
    }
}
