<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\AccessCode as AccessCodeModel;

class AccessCode
{
    protected $key;
    protected $request;
    protected $accessCode;

    public function __construct(Request $request)
    {
        $this->key = $request->user()->email;
        $this->request = $request;
        $this->accessCode = null;
    }

    public function validate()
    {
        if ($this->hasValidAccessCodeSession()) {
            return true;
        }

        if ($this->isLocalEnvironment()) {
            $this->destroySession();
            $this->putAccessCodeSession();

            return true;
        }

        if ($this->isAccessCodeExists()) {
            $this->deleteAccessCode($this->accessCode);
            $this->putAccessCodeSession();

            return true;
        }

        return false;
    }

    public function isLocalEnvironment()
    {
        return 'local' === config('app.env');
    }

    public function hasValidAccessCodeSession()
    {
        if ($this->request->user() &&
            $this->request->session()->has($this->key)
        ) {
            return true;
        }

        return false;
    }

    public function putAccessCodeSession()
    {
        return $this->request->session()->put($this->key, $this->request->user()->id);
    }

    public function isAccessCodeExists()
    {
        if (!$this->request->access_code) {
            return false;
        }

        $this->accessCode = AccessCodeModel::where('user_id', $this->request->user()->id)
            ->where('code', $this->request->access_code)->first();

        if ($this->accessCode) {
            return true;
        }

        return false;
    }

    public function deleteAccessCode(AccessCodeModel $code)
    {
        return $code->delete();
    }

    public function destroySession()
    {
        return $this->request->session()->forget($this->key);
    }

    public static function isValidAccessCodeSession($request)
    {
        if ($request->user() &&
            $request->session()->has($request->user()->email)
        ) {
            return true;
        }

        return false;
    }
}
