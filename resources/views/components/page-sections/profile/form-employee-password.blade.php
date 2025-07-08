<x-forms.form method="PATCH" action="">
    <x-row>
        <x-forms.input label="Current Password" name="current_password" type="password" required />
    </x-row>
    <x-row>
        <x-forms.input label="New Password" name="password" type="password" required />
        <x-forms.input label="New Password Confirm" name="password_confirmation" type="password" />
    </x-row>
    <x-forms.button>Save</x-forms.button>
</x-forms.form>
