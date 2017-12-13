<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AccessCodeRequest extends Notification Implements ShouldQueue
{
    use Queueable;

    private $accessCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($accessCode)
    {
        $this->accessCode = $accessCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', TwilioChannel::class];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Eagerdragon Access Code')
            ->line(sprintf('Your Access Code: %s', $this->accessCode));
    }

    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage())
            ->content(sprintf(
                'Your Access Code: %s', $this->accessCode
            ));
    }
}
