<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyOtherAdminAfterUserWasAdded extends Notification implements ShouldQueue
{
    use Queueable;

    public $newUser;
    public $creator;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newUser, $creator)
    {
        $this->newUser = $newUser;
        $this->creator = $creator;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        if ($this->creator) {
            $message = sprintf('New User: %s %s was added by %s %s',
                $this->newUser->firstname,
                $this->newUser->lastname,
                $this->creator->firstname,
                $this->creator->lastname
           );

        } else {
            $message = 'New User was Registered and waiting for Admin
                        verification.';
        }
        return [
            'link' => sprintf('/users/%s', $this->newUser->id),
            'message' => $message,
            'newUser' => [
                'id' => $this->newUser->id,
                'firstname' => $this->newUser->firstname,
                'lastname' => $this->newUser->lastname,
                'email' => $this->newUser->email
            ],
            'creator' => $this->creator
                ?   [
                        'id' => $this->creator->id,
                        'firstname' => $this->creator->firstname,
                        'lastname' => $this->creator->lastname,
                        'email' => $this->creator->email
                    ]
                : null
        ];
    }

    public function toBroadcast($notifiable)
    {
        if ($this->creator) {
            $message = sprintf('New User: %s %s was added by %s %s',
                $this->newUser->firstname,
                $this->newUser->lastname,
                $this->creator->firstname,
                $this->creator->lastname
           );

        } else {
            $message = 'New User was Registered and waiting for verification.';
        }
        return [
            'link' => sprintf('/users/%s', $this->newUser->id),
            'message' => $message,
            'newUser' => [
                'id' => $this->newUser->id,
                'firstname' => $this->newUser->firstname,
                'lastname' => $this->newUser->lastname,
                'email' => $this->newUser->email
            ],
            'creator' => $this->creator
                ?   [
                        'id' => $this->creator->id,
                        'firstname' => $this->creator->firstname,
                        'lastname' => $this->creator->lastname,
                        'email' => $this->creator->email
                    ]
                : null
        ];
    }
}
