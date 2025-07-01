<x-layout>
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded w-100" style="max-width: 900px">
            <x-page-heading>Complete Your Profile</x-page-heading>

            <form method="PATCH" action="{{ route('employee.profile.update-basic') }}">
                @csrf
                @method('PATCH')
                <h4 class="mb-3">Basic Info</h4>
                <div class="row">
                    <x-forms.input label="Email" name="email" id="email" type="email" value="" readonly/>
                    <x-forms.input label="Gender" name="gender" />
                    <x-forms.input label="DOB" name="dob" type="date" />
                </div>
                <div class="row">
                    <x-forms.input label="Образование" name="education_level" />
                    <x-forms.input label="Опит (години)" name="experience" type="number" />
                </div>
                <x-forms.button>Save</x-forms.button>
            </form>

            <hr>

            <form method="POST" action="{{ route('employee.profile.update-details') }}">
                @csrf
                @method('PATCH')
                <h4 class="mb-3">Контактни данни</h4>
                <div class="row">
                    <x-forms.input label="Държава" name="country" />
                    <x-forms.input label="Област" name="state" />
                    <x-forms.input label="Град" name="city" />
                </div>
                <x-forms.input label="Телефон" name="phone" />
                <div class="row">
                    <x-forms.input label="LinkedIn" name="linkedin_profile" />
                    <x-forms.input label="GitHub" name="github_profile" />
                </div>
                <x-forms.input label="Свободен от" name="available_from" type="date" />
                <x-forms.button>Запази</x-forms.button>
            </form>

            <hr>

{{--            <form method="POST" action="" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <h4 class="mb-3">Documents</h4>--}}
{{--                <x-forms.input label="Файл" name="file" type="file" />--}}
{{--                <x-forms.button>Upload</x-forms.button>--}}
{{--            </form>--}}
        </div>
    </div>
</x-layout>

