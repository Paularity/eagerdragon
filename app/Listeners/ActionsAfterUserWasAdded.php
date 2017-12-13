<?php

namespace App\Listeners;

use App\User;
use App\Events\NewUserAdded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\AccountActivation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyOtherAdminAfterUserWasAdded;

class ActionsAfterUserWasAdded
{
    /**
     * Handle the event.
     *
     * @param  NewUserWasCreated  $event
     * @return void
     */
    public function handle(NewUserAdded $event)
    {
        $newUser = User::find($event->newUser->id);

        // Notify the newly creatd user to activate and change their password.
        // We Only notify user that is created by the admin.
        if ($newUser->status === 'pending') {
            $token = app('auth.password.broker')->createToken($event->newUser);
            $newUser->notify(new AccountActivation($token));
        }

        // Notify other master administrators about the new user.
        Notification::send(
           $this->getOtherAdminUsers($event),
           new NotifyOtherAdminAfterUserWasAdded($event->newUser, $event->creator)
        );
    }

    public function getOtherAdminUsers($event)
    {
        $q = User::whereHas('roles', function($q) {
            $q->where('name', 'master-admin');
        });

        if ($event->creator) {
          $q->where('id', '<>', $event->creator->id);
        }

        if (Auth::check()) {
           $q->where('id', '<>', Auth::user()->id);
        }

        return $q->get(['id', 'email']);
    }
}
