<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\CountryStatistics;

use Carbon\Carbon;


$factory->define(CountryStatistics::class, function (Faker $faker) {
    $factoryData = [];

    $apiUrl = config('app.api_url');

    $summaryResponse = Http::get($apiUrl.'/summary');

    foreach ($summaryResponse['Countries'] as $value) {
        $factoryData['country'] = $value['Country'];
        $factoryData['country_new_confimed'] = $value['NewConfirmed'];
        $factoryData['country_total_confimed'] = $value['TotalConfirmed'];
        $factoryData['country_new_deaths'] = $value['NewDeaths'];
        $factoryData['country_total_deaths'] = $value['TotalDeaths'];
        $factoryData['country_new_recovered'] = $value['NewRecovered'];
        $factoryData['country_total_recovered'] = $value['TotalRecovered'];
        $factoryData['date_updated'] = Carbon::parse($value['Date'])->toDateTimeString();
    }

    return $factoryData;
});
