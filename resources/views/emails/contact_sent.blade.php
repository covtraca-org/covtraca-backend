@component('mail::message', ['logo' => $logo])
# Introduction

Hello {{ $name }}, thanks for your desire to collaborate in this project, we will contact you soon!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
