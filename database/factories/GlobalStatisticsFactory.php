<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GlobalStatistics;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;



$factory->define(GlobalStatistics::class, function (Faker $faker) {

    $factoryData = [];

    $apiUrl = config('app.api_url');

    $summaryResponse = Http::get($apiUrl.'/summary');

    return [
        'global_new_confirmed' => $summaryResponse['Global']['NewConfirmed'],
        'global_total_confimed' => $summaryResponse['Global']['TotalConfirmed'],
        'global_new_deaths' => $summaryResponse['Global']['NewDeaths'],
        'global_total_deaths' => $summaryResponse['Global']['TotalDeaths'],
        'global_new_recovered' => $summaryResponse['Global']['NewRecovered'],
        'global_total_recovered' => $summaryResponse['Global']['TotalRecovered'],
    ];
});
