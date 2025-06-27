<x-layout>
    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded">
            <x-page-heading>Forgot Password</x-page-heading>

            <div class="mb-3 text-muted text-center">
                Enter your email and we'll send you a link to reset your password.
            </div>

            <x-forms.form method="POST" action="{{ route('forgot-password.store') }}">
                <x-forms.input label="Email" name="email" type="email" required />
                <x-forms.button>Send Reset Link</x-forms.button>
            </x-forms.form>

            <div class="text-center mt-4">
                <small class="text-muted">Remembered your password?</small>
                <a href="{{ route('login') }}" class="text-primary text-decoration-none">Login</a>
            </div>
        </div>
    </div>
</x-layout>
