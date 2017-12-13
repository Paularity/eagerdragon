<?php

namespace App;

use Bouncer;
use App\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class BankInformation extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'user_id', 'account_name', 'account_number', 'routing_number', 'tax_id',
    ];

    public function getFillableFields()
    {
        return $this->fillable;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccountNumberAttribute($value)
    {
        $this->attributes['account_number'] = encrypt($value);
    }

    public function getAccountNumberAttribute($value)
    {
        $value = decrypt($value);

        if (!Bouncer::allows('manage-users')) {
            $value = sprintf('*******%s', substr($value, -3));
        }

        return $value;
    }
}
