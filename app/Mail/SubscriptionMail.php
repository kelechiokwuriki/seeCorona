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
        $apiUrl = config('app.covid_19_api_url');
        //get total country data (a timeline you might say)
        //retry after 10 seconds 3 times if no response
        $countryTotalResponse = Http::retry(3, 10000)->get($apiUrl.'/total/country/'.$this->country);

        //use this to get the summary of all countries 
        //(we use this to get the total data of the country)
        //retry after 10 seconds 3 times if no response
        $summaryResponse = Http::retry(3, 10000)->get($apiUrl.'/summary');

        $country = $countryTotalResponse->json()[0]['Country'];

        //search the summary data for the country, get the key
        $key = array_search($country, array_column($summaryResponse['Countries'], 'Country'));

        //retreive the country object
        $countryTotalStats = $summaryResponse['Countries'][$key];


        //show latest first.. order by date (descending order)
        $reversed = array_reverse($countryTotalResponse->json());

        return $this->markdown('emails.subscription')->with([
            'response' => $reversed, 
            'country' => $country,
            'total' => $countryTotalStats,
            'uniqueIdentifier' => $this->uniqueIdentifier
        ]);
    }
}
