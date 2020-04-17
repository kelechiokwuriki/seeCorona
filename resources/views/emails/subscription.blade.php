@component('mail::message')
# Hello from Seecoronastats

You subscribed to receive daily notification about the COVID-19 statistics in Nigeria.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
