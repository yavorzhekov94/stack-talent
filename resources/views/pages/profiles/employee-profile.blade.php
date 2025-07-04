<x-layout>
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded w-100" style="max-width: 900px">
            <x-page-heading>Complete Your Profile</x-page-heading>

            <x-forms.form method="PATCH" action="{{ route('employee.profile.update.basic') }}">
                <h4 class="mb-3">Basic Info</h4>
                <x-row>
                    <x-forms.input
                        label="Email"
                        name="email"
                        id="email"
                        type="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        readonly/>
                </x-row>

                <x-row>
                    <x-forms.input
                        label="First Name" name="first_name"
                        value="{{ old('first_name', auth()->user()->first_name) }}"
                        required
                    />
                    <x-forms.input
                        label="Last Name"
                        name="last_name"
                        value="{{ old('last_name', auth()->user()->last_name) }}"
                        required />
                </x-row>

                <x-forms.button>Save</x-forms.button>
            </x-forms.form>

            <x-divider />
            <x-forms.form method="PATCH" action="">
                <h4 class="mb-3">Contact data</h4>
                <x-row>
                    <h6> Gender</h6>
                    <x-forms.radio label="Male" name="gender" id="male"/>
                    <x-forms.radio label="Female" name="gender" id="female" />
                    <x-forms.radio label="Other" name="gender" id="other" />
                </x-row>

                <x-row>
                    <x-forms.input label="DOB" name="dob" type="date" />
                </x-row>

                <x-row>
                    <x-forms.select label="Country" name="country" >
                        @foreach (config('countries') as $country_code => $country_name)
                            <option value="{{ $country_code }}">{{ $country_name }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input label="State" name="state" />
                    <x-forms.input label="City" name="city" />
                </x-row>

                <x-row>
                    <x-forms.select label="Education" name="education_level" >
                        <option value="high_school">High School</option>
                        <option value="bachelor">Bachelor</option>
                        <option value="master">Master</option>
                        <option value="phd">Phd</option>
                    </x-forms.select>
                    <x-forms.input label="Experience time(in years)" name="experience" type="number" />
                    <x-forms.input label="Phone" name="phone" />
                </x-row>

                <x-row>
                    <x-forms.input label="LinkedIn" name="linkedin_profile" />
                    <x-forms.input label="GitHub" name="github_profile" />
                </x-row>

                <x-row>
                    <x-forms.checkbox label="Is Employed" name="is_employed" />
                    <x-forms.input label="Available from" name="available_from" type="date" />
                </x-row>

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

