@component('mail::message')
# Dear Sir/Ma

Your OTP for {{ config('app.name') }} is {{$token}}. Use this Passcode to verify your email address

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
