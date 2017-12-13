<?php

namespace App;

use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\Model;

class AgentCSR extends Model implements AuditableContract
{
    use AuditableTrait;

    protected $fillable = [
        'agent_account_id', 'firstname', 'lastname',
        'email', 'address', 'mobile',
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id', 'agent_account_id', 'udpated_at',

    ];

    protected $table = 'agent_csr';

    public function agentAccount()
    {
        return $this->belongsTo('App\AgentAccount');
    }
}
