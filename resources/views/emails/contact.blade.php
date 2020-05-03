@component('mail::message')

<img src="https://api.covtraca.org/images/logo.png" data-auto-embed="base-64">

# Important notice

This person wants to collaborate with the project:

Name: {{ $content->name }}
<br/>
Email: <a href="mailto:{{ $content->email }}">{{ $content->email }}</a>
<br/>
Message: {{ $content->message }}
<br/>

@component('mail::button', ['url' => 'mailto:' . $content->email, 'color' => 'blue'])
Send email
@endcomponent

@endcomponent
