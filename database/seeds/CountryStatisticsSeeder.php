<?php

use Illuminate\Database\Seeder;

use App\CountryStatistics;
use Carbon\Carbon;



class CountryStatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apiUrl = config('app.api_url');

        $summaryResponse = Http::get($apiUrl.'/summary');

        foreach ($summaryResponse['Countries'] as $value) {

            CountryStatistics::create([
                'country' => $value['Country'],
                'country_new_confimed' => $value['NewConfirmed'],
                'country_total_confimed' => $value['TotalConfirmed'],
                'country_new_deaths' => $value['NewDeaths'],
                'country_total_deaths' => $value['TotalDeaths'],
                'country_new_recovered' => $value['NewRecovered'],
                'country_total_recovered' => $value['TotalRecovered'],
                'date_updated' => Carbon::parse($value['Date'])->toDateTimeString()
            ]);
        }
    }

}
