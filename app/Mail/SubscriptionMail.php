<?php

namespace App\Mail;
use App\Subscription;
use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $country;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($country)
    {
        $this->country = $country;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $response = Http::get('https://api.covid19api.com/total/country/'.$this->country);

        $country = $response->json()[0]['Country'];

        $reversed = array_reverse($response->json());

        return $this->markdown('emails.subscription')->with([
            'response' => $reversed, 
            'country' => $country
        ]);
    }
}
