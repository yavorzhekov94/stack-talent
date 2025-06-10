<x-layout>
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="login-card shadow-sm bg-white p-4 p-md-5 rounded">
            <h2 class="text-center text-dark mb-4">Login</h2>

            <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 mb-3">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Icon" width="20" height="20">
                <span>Sign in with Google</span>
            </a>

            <div class="text-center mb-3 text-muted">or</div>

            <x-forms.form method="PATCH" action="{{ route('login') }}">
                <x-forms.input label="Email" name="email" id="email" type="email" required autofocus />
                <x-forms.input label="Password" name="password" id="password" type="password" required />

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label text-muted" for="remember">Remember me</label>
                    </div>
                    <a href="#" class="text-decoration-none small">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
            </x-forms.form>

            <div class="text-center mt-4">
                <small class="text-muted">Don't have an account?</small>
                <a href="{{ route('register') }}" class="text-primary text-decoration-none">Register</a>
            </div>
        </div>
    </div>
</x-layout>
