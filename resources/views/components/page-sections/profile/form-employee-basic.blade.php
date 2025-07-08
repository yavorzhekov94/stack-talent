<x-forms.form method="PATCH" action="{{ route('employee.profile.update.basic') }}">
    <x-row>
        <x-forms.input
            label="Email"
            name="email"
            id="email"
            type="email"
            :value="old('email', $user->email)"
            readonly/>
    </x-row>

    <x-row>
        <x-forms.input
            label="First Name" name="first_name"
            :value="old('first_name', $user->first_name)"
            required
        />
        <x-forms.input
            label="Last Name"
            name="last_name"
            :value="old('last_name', $user->last_name)"
            required />
    </x-row>

    <x-forms.button>Save</x-forms.button>
</x-forms.form>
