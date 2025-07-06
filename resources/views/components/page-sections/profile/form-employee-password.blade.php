<x-forms.form method="PATCH" action="">
    <x-section-heading>Change password</x-section-heading>
    <div class="row">
        <x-forms.input label="Current Password" name="current_password" type="password" required />
    </div>
    <div class="row">
        <x-forms.input label="New Password" name="password" type="password" required />
        <x-forms.input label="New Password Confirm" name="password_confirmation" type="password" />
    </div>
    <x-forms.button>Save</x-forms.button>
</x-forms.form>
