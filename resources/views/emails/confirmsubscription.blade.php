@component('mail::message')
# Hello from Seecoronastats

You subscribed to receive a daily notification of the statistics in {{ ucfirst($country) }}.

@component('mail::button', ['url' => $actionUrl])
Confirm my subscription
@endcomponent

Your subscription will expire in 12 hours if not confirmed.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
