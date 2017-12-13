<?php

namespace App;

use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Chargeback extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'merchant_id', 'processor_id', 'reason_code',
        'auth_code', 'date', 'amount', 'sale_date',
        'sale_value', 'sale_transaction_id', 'deadline',
        'response_date', 'response_text', 'credit_card_type',
        'credit_card_number', 'firstname', 'lastname',
        'status', 'dispute_result', 'comment', 'update_date', 
        'charged_date', 'new', 'is_for_moto'
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id', 'merchant_id', 'udpated_at',

    ];

    public function merchant()
    {
        return $this->belongsTo('App\User', 'merchant_id');
    }

    public function supportingDocs()
    {
        return $this->hasMany('App\SupportingDocs');
    }
}
