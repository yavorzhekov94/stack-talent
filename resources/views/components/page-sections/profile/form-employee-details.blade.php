<x-forms.form method="PATCH" action="{{ route('employee.profile.update.details') }}">
    <x-row>
        <h6>Gender</h6>
        <x-forms.radio
            label="Male"
            name="gender"
            id="male"
            value="male"
            :checked="$selectedGender === 'male'" />
        <x-forms.radio
            label="Female"
            name="gender"
            id="female"
            value="female"
            :checked="$selectedGender === 'female'" />
        <x-forms.radio
            label="Other"
            name="gender"
            id="other"
            value="other"
            :checked="$selectedGender === 'other'" />
    </x-row>

    <x-row>
        <x-forms.input
            label="DOB"
            name="dob"
            type="date"
            :value="old('dob', \Carbon\Carbon::parse($employee_profile->dob)->format('Y-m-d'))"
        />
    </x-row>

    <x-row>
        <x-forms.select label="Country" name="country" >
            @foreach (config('countries') as $country_code => $country_name)
                <option
                    value="{{ $country_code }}"
                    @selected(old('country', $employee_profile->country ?? '') === $country_code)
                >
                    {{ $country_name }}
                </option>
            @endforeach
        </x-forms.select>
        <x-forms.input
            label="State"
            name="state"
            :value="old('state', $employee_profile->state)"
        />
        <x-forms.input
            label="City"
            name="city"
            :value="old('city', $employee_profile->city)"
        />
    </x-row>

    <x-row>
        <x-forms.select label="Education" name="education_level" >
            @foreach(config('education_levels') as $ed_level_code => $ed_level_name)
                <option
                    value="{{ $ed_level_code }}"
                    @selected(old('education_level', $employee_profile->education_level ?? '') === $ed_level_code)
                >
                    {{ $ed_level_name }}
                </option>
            @endforeach
        </x-forms.select>
        <x-forms.input
            label="Experience time(in years)"
            name="experience"
            type="number"
            :value="old('experience', $employee_profile->experience)"
        />
        <x-forms.input
            label="Phone"
            name="phone"
            :value="old('phone', $employee_profile->phone)"
        />
    </x-row>

    <x-row>
        <x-forms.input
            label="LinkedIn"
            name="linkedin_profile"
            :value="old('linkedin_profile', $employee_profile->linkedin_profile)"
        />
        <x-forms.input
            label="GitHub"
            name="github_profile"
            :value="old('github_profile', $employee_profile->github_profile)"
        />
    </x-row>

    <x-row>
        <x-forms.checkbox
            label="Is Employed"
            name="is_employed"
            :checked="$employeeProfile->is_employed ?? false"
        />
        <x-forms.input
            label="Available from"
            name="available_from"
            type="date"
            :value="old('available_from', \Carbon\Carbon::parse($employee_profile->available_from)->format('Y-m-d'))"
        />
    </x-row>

    <x-forms.button>Save</x-forms.button>
</x-forms.form>
