<?php 
use Carbon\Carbon; 
?>

@component('mail::message')
# Hello from Seecoronastats

You subscribed to receive daily notification about the COVID-19 statistics in {{ucfirst($country)}}.

@component('mail::button', ['url' => $viewInBrowserCountryUrl])
View in browser
@endcomponent

@component('mail::panel')
@component('mail::table')
| New Cases               | Total Cases                | New Deaths            | Total Deaths            | New Recovered            | Total Recovered            |
| ------------------------|:--------------------------:| ---------------------:| -----------------------:| ------------------------:| --------------------------:|
{{$total['NewConfirmed']}}|{{$total['TotalConfirmed']}}|{{$total['NewDeaths']}}|{{$total['TotalDeaths']}}|{{$total['NewRecovered']}}|{{$total['TotalRecovered']}}|
@endcomponent
Date: {{Carbon::parse($total['Date'])->format('M d Y')}}
@endcomponent

@component('mail::table')
| Cases               | Deaths           | Recovered           | Date                                           |
| --------------------|:----------------:| -------------------:| ----------------------------------------------:|
@foreach ($response as $res)
|{{$res['Confirmed']}}|{{$res['Deaths']}}|{{$res['Recovered']}}|{{Carbon::parse($res['Date'])->format('M d Y')}}|
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}


@component('mail::subcopy')

@component('mail::button', ['url' => $unsubscribeUrl])
Unsubscribe 
@endcomponent

@endcomponent

@endcomponent
