<x-layout>
    @push('scripts')
        @vite(['resources/js/pages/profile/profile-sections.js'])
    @endpush
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
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2 cursor-pointer section-toggle" data-target="#basic-section">
                    <x-section-heading>Basic Info</x-section-heading>
                    <i class="bi bi-chevron-down toggle-icon"></i>
                </div>
                <div id="basic-section" class="collapse">
                    @include('components.page-sections.profile.form-employee-basic', ['user' => $user])
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2 cursor-pointer section-toggle" data-target="#details-section">
                    <x-section-heading>Details</x-section-heading>
                    <i class="bi bi-chevron-down toggle-icon"></i>
                </div>

                <div id="details-section" class="collapse">
                    @include('components.page-sections.profile.form-employee-details', [
                        'employeeProfile' => $employee_profile,
                        'selectedGender' => $selectedGender
                    ])
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2 cursor-pointer section-toggle" data-target="#password-section">
                    <x-section-heading>Change password</x-section-heading>
                    <i class="bi bi-chevron-down toggle-icon"></i>
                </div>

                <div id="password-section" class="collapse">
                    @include('components.page-sections.profile.form-employee-password', ['user' => $user])
                </div>
            </div>
        </div>
    </div>
</x-layout>
