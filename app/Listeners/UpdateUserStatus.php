<?php

namespace App\Listeners;

use App\Notifications\AccountActivation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use OwenIt\Auditing\Events\Audited;

class UpdateUserStatus
{
    /**
     * Handle the event.
     *
     * @param  Audited  $event
     * @return void
     */
    public function handle(Audited $event)
    {
        if(class_basename($event->model) === 'User'
           && isset($event->audit->old_values['status'])
           && isset($event->audit->new_values['status'])
           && $event->audit->old_values['status'] === 'for verification'
           && $event->audit->new_values['status'] === 'active'
           ){
            $token = app('auth.password.broker')->createToken($event->model);
            $event->model->notify(new AccountActivation($token));
        }
    }
}
