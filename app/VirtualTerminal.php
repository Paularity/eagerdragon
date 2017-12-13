<?php

namespace App;

use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class VirtualTerminal extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'customer_id', 'payment_id',
        'billing_firstname', 'billing_lastname',
        'billing_address', 'billing_mobile', 'billing_email',
        'shipping_firstname', 'shipping_lastname',
        'shipping_address', 'shipping_mobile', 'shipping_email',
    ];

    protected $hidden = [
        'credit_card_number', 'credit_card_expiration_year',
        'credit_card_expiration_month', 'credit_card_cvv',
    ];

    public function merchant()
    {
        return $this->belongsTo('App\Merchant');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'transaction_id');
    }
}
