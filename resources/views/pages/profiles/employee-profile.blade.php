<x-layout>
    @if (session('status'))
        <x-alert type="success">
            {{ session('status') }}
        </x-alert>
    @endif

    @if (session('error'))
        <x-alert type="danger">
            {{ session('error') }}
        </x-alert>
    @endif
    @php
           $user = auth()->user();
           $employee_profile = $user->employee;
           $selectedGender = old('gender', $employee_profile->gender ?? null);
    @endphp
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded w-100" style="max-width: 900px">
            <x-page-heading>Complete Your Profile</x-page-heading>

            @include('components.page-sections.profile.form-employee-basic', ['user' => $user])
            <x-divider />

            @include('components.page-sections.profile.form-employee-details', [
                'employeeProfile' => $employee_profile,
                'selectedGender' => $selectedGender
            ])
            <x-divider />

            @include('components.page-sections.profile.form-employee-password', ['user' => $user])
        </div>
    </div>
</x-layout>

