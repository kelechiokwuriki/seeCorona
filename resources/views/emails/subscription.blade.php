<?php 
use Carbon\Carbon; 
?>


@component('mail::message')
# Hello from Seecoronastats

You subscribed to receive daily notification about the COVID-19 statistics in {{ucfirst($country)}}.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/countries/'.$country])
View in browser
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
@endcomponent