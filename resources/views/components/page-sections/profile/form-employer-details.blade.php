<x-forms.form method="PATCH" action="{{ route('employer.profile.update.details') }}">
    <x-row>
        <x-forms.select label="Country" name="country" >
            @foreach (config('countries') as $country_code => $country_name)
                <option
                    value="{{ $country_code }}"
                    @selected(old('country', $employer_profile->country ?? '') === $country_code)
                >
                    {{ $country_name }}
                </option>
            @endforeach
        </x-forms.select>
        <x-forms.input
            label="State"
            name="state"
            :value="old('state', $employer_profile->state)"
        />
        <x-forms.input
            label="City"
            name="city"
            :value="old('city', $employer_profile->city)"
        />
    </x-row>

    <x-row>
        <x-forms.input
            label="Phone"
            name="phone"
            :value="old('phone', $employer_profile->phone)"
        />
    </x-row>

    <x-row>
        <h6> Company information </h6>

        <x-forms.input
            label="Compnany Name"
            name="company_name"
            :value = "old('company_name', $employer_profile->company_name)"
        />

        <x-forms.textarea label="Company Description" name="company_description" rows="5">
            {{ old('company_description', $employer_profile->company_description) }}
        </x-forms.textarea>

        <x-forms.input label="Company Email" name="company_email" type="email" />

        <x-forms.input
            label="Compnany Website"
            name="company_website"
            :value = "old('company_website', $employer_profile->company_website)"
        />

        <x-forms.textarea label="Company Address" name="company_address">
            {{ old('company_address', $employer_profile->company_address) }}
        </x-forms.textarea>

    </x-row>
    <x-forms.button>Save</x-forms.button>
</x-forms.form>
