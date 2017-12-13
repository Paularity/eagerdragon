<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChargebackSendToBank extends Mailable
{
    use Queueable, SerializesModels;

    public $chargeback, $transaction, $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $chargeback, $transaction, $files )
    {
        $this->chargeback = $chargeback;
        $this->transaction = $transaction;
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('email.chargeback-sendtobank');

        foreach ($this->files as $file) {
            $email->attach(public_path(
                    'files/supporting-docs/'.$this->chargeback['id'].'/'.
                    $file['filename']));
        }
        return $email;
    }
}
