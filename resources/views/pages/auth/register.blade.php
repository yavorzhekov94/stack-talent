<x-layout>
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded">
            <x-page-heading>Create Your Account</x-page-heading>

            {{-- Google Register --}}
            <a href="#" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 mb-3">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Icon" width="20" height="20">
                <span>Sign up with Google</span>
            </a>

            <div class="text-center mb-3 text-muted">or</div>

            {{-- Laravel Register Form --}}
            <x-forms.form method="POST" action="{{ route('register.store') }}">

                <div class="row">
                    <x-forms.input label="First Name" name="first_name" required />
                    <x-forms.input label="Last Name" name="last_name" required />
                </div>
                <x-forms.input label="Email" name="email" type="email" required />

                <div class="row">
                    <x-forms.input label="Password" name="password" type="password" required />
                    <x-forms.input label="Password Confirm" name="password_confirmation" type="password" />
                </div>

                <x-forms.select label="User Type" name="user_type" required>
                    <option value="employee">Employee</option>
                    <option value="employer">Employer</option>
                </x-forms.select>

                <x-forms.button>Register</x-forms.button>
            </x-forms.form>

            <div class="text-center mt-4">
                <small class="text-muted">Already have an account?</small>
                <a href="{{ route('login') }}" class="text-primary text-decoration-none">Login</a>
            </div>
        </div>
    </div>
</x-layout>
