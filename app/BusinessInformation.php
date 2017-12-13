<?php

namespace App;

use Carbon\Carbon;
use App\User;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class BusinessInformation extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'business_name', 'business_type', 'description', 'industry',
        'business_legal_name', 'estimated_monthly_sales', 'business_country',
        'start_date', 'business_address', 'business_city', 'business_state',
        'business_zip', 'business_website',
    ];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id', 'user_id', 'udpated_at',

    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = trim($value);
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function user()
    {
        return $this->belgongsTo(User::class);
    }
}
