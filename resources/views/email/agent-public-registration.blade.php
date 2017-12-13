@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '/agent-registration/confirm'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
