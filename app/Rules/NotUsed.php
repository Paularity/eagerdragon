<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NotUsed
{
	public function passes( $attribute, $value, $parameters )
	{
		$user = DB::table('users')
					->where('email', $parameters[0])
					->first();

        if (!$user) {
            return false;
        }

		$passwords = DB::table('passwords')
				->where('user_id', $user->id)
				->latest()
				->limit(4)
				->get();

		foreach ($passwords as $pass) {
			if (Hash::check($value, $pass->password)) {
				return false;
			}
		}
		return true;
	}
}