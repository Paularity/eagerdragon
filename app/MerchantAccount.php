<?php

namespace App;

use App\User;
use App\Processor;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class MerchantAccount extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'mid', 'country', 'address', 'city', 'state', 'zip',
        'created_by',
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
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->hasMany('App\Customer');
    }

    public function processors()
    {
        return $this->belongsToMany(Processor::class)
            ->withPivot(
                'currency',
                'routing',
                'rebill_routing',
                'mid',
                'start_date',
                'notes',
                'descriptor',
                'username',
                'password',
                'is_active',
                'download_from_platform',
                'validate_transaction_data',
                'is_for_moto',
                'api_url_production',
                'api_url_testing',
                'api_key',
                'api_secret',
                'api_token',
                'payment_method',
                'transaction_type',
                'acquire_type'
            );
    }

    public function setMidAttribute($value)
    {
        $this->attributes['mid'] = encrypt($value);
    }

    public function getMidAttribute($value)
    {
        return decrypt($value);
    }
}
