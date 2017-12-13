<?php

namespace App;

use App\BankFee;
use App\AgentCSR;
use App\GatewayFee;
use App\AntiFraudFee;
use App\AgentAccount;
use App\MerchantAccount;
use App\BankInformation;
use App\BillingSchedule;
use App\MiscellaneousFee;
use App\MerchantGatewayFees;
use App\MerchantBankFees;
use App\BusinessInformation;
use Illuminate\Support\Arr;
use App\Events\CreateNotification;
use App\Events\DeleteNotification;
use App\Events\UpdateNotification;
use App\Notifications\PasswordReset;
use Illuminate\Support\Facades\Redis;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Lab404\Impersonate\Models\Impersonate;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Auditable
{
    use AuditableTrait;
    use Notifiable;
    use Impersonate;
    use HasRolesAndAbilities;

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id', 'remember_token', 'audited_at', 'first_time_login', 'password',
        'updated_at',  'token',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'username', 'email', 'password',
        'mobile_number', 'first_time_login', 'status', 'audited_at',
        'last_password_reset_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['last_password_reset_at'];

    /**
     * Lists of possible user status.
     *
     * @var array
     */
    protected $statusLists = [
        'active' => 1,
        'pending' => 2,
        'suspended' => 3,
        'deactivated' => 4,
        'for verification' => 5,
    ];

    protected $abilitiesLists = [
        'impersonate-user',
        'manage-app-settings',
        'manage-users',
        'manage-merchants',
        'manage-customers',
        'manage-languages',
        'manage-agents',
        'manage-processors',
        'configure-mids',
        'edit-fees',
        'view-audit-logs',
        'view-reports',
        'view-statements',
        'view-dashboard',
        'process-chargebacks',
        'use-virtual-terminal',
    ];

    protected $abilitiesPerRole = [
        'master-admin' => [
            'impersonate-user',
            'manage-app-settings',
            'manage-users',
            'manage-merchants',
            'manage-customers',
            'manage-languages',
            'manage-agents',
            'manage-processors',
            'configure-mids',
            'edit-fees',
            'view-audit-logs',
            'view-reports',
            'view-statements',
            'view-dashboard',
            'process-chargebacks',
            'use-virtual-terminal',
        ],
        'merchant-admin' => [
            'view-reports',
            'process-chargebacks',
            'use-virtual-terminal',
        ],
        'merchant' => [
            'view-reports',
            'view-statements',
            'process-chargebacks',
            'use-virtual-terminal',
        ],
        'merchant-csr' => [
            'use-virtual-terminal',
        ],
        'agent-admin' => [
            'manage-merchants',
            'manage-agents',
            'edit-fees',
            'view-reports',
            'view-statements',
        ],
        'agent' => [
            'manage-merchants',
            'manage-agents',
            'view-reports',
            'view-statements',
        ],
    ];

    public function transformAudit(array $data)
    {
        if (request('role')) {
            Arr::set(
                $data,
                'new_values.role',
                request('role')
            );
        }

        if (request('oldRole')) {
            Arr::set(
                $data,
                'old_values.role',
                request('oldRole')
            );
        }

        if (request('abilities')) {
            Arr::set(
                $data,
                'new_values.abilities',
                request('abilities')
            );
        }

        if (request('oldAbilities')) {
            Arr::set(
                $data,
                'old_values.abilities',
                request('oldAbilities')
            );
        }

        if (Arr::has($data, 'new_values.status')) {
            Arr::set($data, 'new_values.status', request('status') ?: 'pending');
        }

        if (Arr::has($data, 'old_values.status')) {
            Arr::set(
                $data,
                'old_values.status',
                 $this->getStatusAttribute($data['old_values']['status'])
            );
        }

        if (count($data['old_values']) <= 0) {
            $data['old_values'] = null;
        }

        if (count($data['new_values']) <= 0) {
            $data['new_values'] = null;
        }

        return $data;
    }

    public function getPresetAbilities()
    {
        return $this->abilitiesLists;
    }

    public function getAbilitiesPerRole($ability)
    {
        return $this->abilitiesPerRole[$ability];
    }

    public function getPresetSTatus()
    {
        return $this->statusLists;
    }

    public function scopeStatus($query, $status)
    {
        $uStatus = isset($this->statusLists[$status])
            ? $this->statusLists[$status]
            : null;

        return $query->where('status', $uStatus);
    }

    public function setStatusAttribute($value)
    {
        $value = isset($this->statusLists[$value])
            ? $this->statusLists[$value]
            : 1 ;

        $this->attributes['status'] = $value;
    }

    public function getStatusAttribute($value)
    {
        return array_search($value, $this->statusLists);
    }

    public function accessCode()
    {
        return $this->hasOne(AccessCode::class);
    }

    public function routeNotificationForTwilio()
    {
        return $this->mobile_number;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    public function customer()
    {
        return $this->hasMany('App\Customer');
    }

    public function agentAccount()
    {
        return $this->hasOne(AgentAccount::class)->withDefault();
    }

    public function merchantAccount()
    {
        return $this->hasOne(MerchantAccount::class)->withDefault();
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function businessInformation()
    {
        return $this->hasOne(BusinessInformation::class)->withDefault();
    }

    public function bankInformation()
    {
        return $this->hasOne(BankInformation::class)->withDefault();
    }

    public function bankFee()
    {
        return $this->hasMany(BankFee::class);
    }

    public function antiFraudFee()
    {
        return $this->hasMany(AntiFraudFee::class);
    }

    public function billingSchedule()
    {
        return $this->hasMany(BillingSchedule::class);
    }

    public function miscellaneousFee()
    {
        return $this->hasMany(MiscellaneousFee::class);
    }

    public function gatewayFee()
    {
        return $this->hasMany(GatewayFee::class);
    }

    public function supportingDocs()
    {
        return $this->hasMany('App\SupportingDocs');
    }

    public function merchantGatewayFee()
    {
        return $this->hasMany(MerchantGatewayFees::class);
    }

    public function merchantBankFees()
    {
        return $this->hasMany(MerchantBankFees::class);
    }
}
