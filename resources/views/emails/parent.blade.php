
@component('mail::message')

Click here to reset your password: {{ url('password/reset/') }}

@component('mail::button', ['url' => ''])
لمزيد من التفاصيل
@endcomponent

شكرا,<br>
{{ config('app.name') }}
@endcomponent



