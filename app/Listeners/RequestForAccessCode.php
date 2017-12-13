<?php

namespace App\Listeners;

use App\Notifications\AccessCodeRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RequestForAccessCode
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $login)
    {
        if (config('app.env') === 'local') {
            return true;
        }

        // Code will be filled by the user model mutator.
        $accessCode = $login->user->accessCode()
            ->create(['code' => null])->code;

        $login->user->notify(new AccessCodeRequest($accessCode));
    }
}
