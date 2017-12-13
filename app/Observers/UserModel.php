<?php

namespace App\Observers;

use App\User;
use App\Events\NewUserAdded;
use Illuminate\Support\Facades\Auth;

class UserModel
{
    public function created(User $user)
    {
        event(new NewUserAdded($user, Auth::user()));
    }
}