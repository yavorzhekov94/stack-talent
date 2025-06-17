<x-layout>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <x-page-heading> Choose User Type</x-page-heading>

            <x-forms.form method="POST" action="{{ route('auth.google.complete-registration') }}">
                <div class="mb-3">
                    <x-forms.radio label="Employee" name="user_type" id="employee" />
                    <x-forms.radio label="Employer" name="user_type" id="employer" />
                </div>
                <button>Register</button>
            </x-forms.form>
        </div>
    </div>
</x-layout>
