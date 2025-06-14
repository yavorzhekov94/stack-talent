<x-layout>
    @if (session('status'))
        <x-alert type="success">
            {{ session('status') }}
        </x-alert>
    @endif

    @if (session('error'))
        <x-alert type="danger">
            {{ session('error') }}
        </x-alert>
    @endif
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="login-card shadow-sm bg-white p-4 p-md-5 rounded">
            <x-page-heading>Login</x-page-heading>

            <a href="{{ route('google.redirect') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 mb-3">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Icon" width="20" height="20">
                <span>Sign in with Google</span>
            </a>

            <div class="text-center mb-3 text-muted">or</div>

            <x-forms.form method="POST" action="{{ route('login.store') }}">
                <x-forms.input label="Email" name="email" id="email" type="email" required autofocus />
                <x-forms.input label="Password" name="password" id="password" type="password" required />
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <x-forms.checkbox  label="Remember me" name="remember"/>
                    <a href="#" class="text-decoration-none small">Forgot Password?</a>
                </div>
                <x-forms.button>Login</x-forms.button>
            </x-forms.form>

            <div class="text-center mt-4">
                <small class="text-muted">Don't have an account?</small>
                <a href="{{ route('register') }}" class="text-primary text-decoration-none">Register</a>
            </div>
        </div>
    </div>
</x-layout>
