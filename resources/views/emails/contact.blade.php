@component('mail::message')
# {{ $subject }}

{{ $body }}

Thanks,<br>
{{ $name }}<br>
{{ $email }}
@endcomponent
