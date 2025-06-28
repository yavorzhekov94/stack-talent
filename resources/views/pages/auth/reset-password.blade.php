<x-layout>
    @push('scripts')
        @vite(['resources/js/pages/auth-toggle-password.js'])
    @endpush
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded">
            <x-page-heading>Reset Your Password</x-page-heading>

            <x-forms.form method="POST" action="{{ route('password.store') }}">
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <input type="hidden" name="email" value="{{ old('email', request('email')) }}">

                <x-forms.input label="New Password" name="password" type="password" required />
                <x-forms.input label="Confirm Password" name="password_confirmation" type="password" required />

                <x-forms.button>Reset Password</x-forms.button>
            </x-forms.form>

            <div class="text-center mt-4">
                <small class="text-muted">Go back to</small>
                <a href="{{ route('login') }}" class="text-primary text-decoration-none">Login</a>
            </div>
        </div>
    </div>
</x-layout>
