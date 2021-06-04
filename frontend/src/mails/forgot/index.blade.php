@component('mail::message')

# Password reset

Hello,

We've received a request to reset the password for the UpBoard account associated with *{{ $user->email }}*. So, we've just created a new one for you and sent it to you in a very secure way.

Your new password: **{{ $newPassword }}**

@component('mail::button', ['url' => env('APP_URL').'/login'])
Login to UpBoard
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
