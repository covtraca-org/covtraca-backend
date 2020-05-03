@component('mail::message')

<img src="https://api.covtraca.org/images/logo.png" data-auto-embed="base-64">

Hello {{ $name }}, thanks for your desire to collaborate in this project, we will contact you soon!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
