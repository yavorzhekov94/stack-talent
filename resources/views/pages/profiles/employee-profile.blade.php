<x-layout>
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded w-100" style="max-width: 900px">
            <x-page-heading>Complete Your Profile</x-page-heading>

            <x-forms.form method="PATCH" action="">
                <h4 class="mb-3">Basic Info</h4>
                <div class="row">
                    <x-forms.input label="Email" name="email" id="email" type="email" value="" readonly/>
                </div>
                <div class="row">
                    <x-forms.input label="First Name" name="first_name" required />
                    <x-forms.input label="Last Name" name="last_name" required />
                </div>
                <x-forms.button>Save</x-forms.button>
            </x-forms.form>

            <x-divider />
            <x-forms.form method="PATCH" action="">
                <h4 class="mb-3">Contact data</h4>
                <div class="row">
                    <h6> Gender</h6>
                    <x-forms.radio label="Male" name="gender" id="male"/>
                    <x-forms.radio label="Female" name="gender" id="female" />
                    <x-forms.radio label="Other" name="gender" id="other" />
                </div>
                <div class="row">
                    <x-forms.input label="DOB" name="dob" type="date" />
                </div>
                <div class="row">
                    <x-forms.input label="Country" name="country" />
                    <x-forms.input label="State" name="state" />
                    <x-forms.input label="City" name="city" />
                </div>
                <div class="row">
                    <x-forms.input label="Education" name="education_level" />
                    <x-forms.input label="Experience time" name="experience" type="number" />
                </div>
                <x-forms.input label="Phone" name="phone" />
                <div class="row">
                    <x-forms.input label="LinkedIn" name="linkedin_profile" />
                    <x-forms.input label="GitHub" name="github_profile" />
                </div>
                <x-forms.input label="Available from" name="available_from" type="date" />
                <x-forms.button>Save</x-forms.button>
            </x-forms.form>

            <x-divider />
            <x-forms.form method="PATCH" action="">
                <h4 class="mb-3">Change password</h4>
                <div class="row">
                    <x-forms.input label="Current Password" name="current_password" type="password" required />
                </div>
                <div class="row">
                    <x-forms.input label="New Password" name="password" type="password" required />
                    <x-forms.input label="New Password Confirm" name="password_confirmation" type="password" />
                </div>
                <x-forms.button>Save</x-forms.button>
            </x-forms.form>
        </div>
    </div>
</x-layout>

