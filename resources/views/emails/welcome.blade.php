@component('mail::message')
    # Welcome to {{ config('app.name') }} 🎉

    Hi {{ $user->first_name }},

    We're excited to have you on board.
    Thank you for registering at **{{ config('app.name') }}**!

    You can now log in and start exploring everything we have to offer.

    @component('mail::button', ['url' => url('/login')])
        Login to Your Account
    @endcomponent

    If you have any questions, feel free to contact us anytime.

    Thanks again,
    The {{ config('app.name') }} Team

@endcomponent
