<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $country;
    protected $uniqueIdentifier;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($country, $uniqueIdentifier)
    {
        $this->country = $country;
        $this->uniqueIdentifier = $uniqueIdentifier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confirmsubscription')->with([
            'country' => $this->country,
            'uniqueIdentifier' => $this->uniqueIdentifier
        ]);
    }
}
