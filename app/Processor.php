<?php

namespace App;

use App\MerchantAccount;
use App\MerchantBankFees;
use App\MerchantGatewayFees;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Processor extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'name', 'short_name', 'email', 'wire_fee', 'timezone', 'type',
        'is_integrated'
    ];

    protected $processorType = [
        'bank' => 'Bank',
        'gateway' => 'Gateway',
    ];

    public function getProcessoryTypes()
    {
        return $this->processorType;
    }

    public function setIsIntegratedAttribute($value)
    {
        $this->attributes['is_integrated'] = $value ? 1 : 0;
    }

    public function merchantAccounts()
    {
        return $this->belongsToMany(MerchantAccount::class)
            ->withPivot(
                'currency',
                'routing',
                'rebill_routing',
                'start_date',
                'notes',
                'username',
                'password',
                'is_active',
                'download_from_platform',
                'validate_transaction_data',
                'is_for_moto',
                'payment_method',
                'transaction_type',
                'acquire_type',
                'api_url_production',
                'api_url_testing',
                'api_key',
                'api_secret',
                'api_token'
            );
    }

    public function merchantBankFee()
    {
        return $this->hasMany(MerchantBankFees::class);
    }

    public function merchantGatewayFees()
    {
        return $this->hasMany(MerchantGatewayFees::class)
            ->withPivot(
                'currency',
                'routing',
                'rebill_routing',
                'start_date',
                'notes',
                'username',
                'password',
                'is_active',
                'download_from_platform',
                'validate_transaction_data',
                'is_for_moto',
                'api_url_production',
                'api_url_testing',
                'api_key',
                'payment_method',
                'transaction_type',
                'acquire_type'
            );
    }
}
