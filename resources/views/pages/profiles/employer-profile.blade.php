<x-layout>
    @push('scripts')
        @vite(['resources/js/pages/profile/profile-sections.js', 'resources/js/pages/profile/profile-documents.js'])
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
        $employer_profile = $user->employer;
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
                    @include('components.page-sections.profile.form-basic-details', ['user' => $user])
                </div>
            </div>

            <x-divider />
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2 cursor-pointer section-toggle" data-target="#details-section">
                    <x-section-heading>Details</x-section-heading>
                    <i class="bi bi-chevron-down toggle-icon"></i>
                </div>

                <div id="details-section" class="collapse">
                    @include('components.page-sections.profile.form-employer-details', [
                        'employerProfile' => $employer_profile
                    ])
                </div>
            </div>

            @if (is_null($user->google_id))
                <x-divider />
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2 cursor-pointer section-toggle" data-target="#password-section">
                        <x-section-heading>Change password</x-section-heading>
                        <i class="bi bi-chevron-down toggle-icon"></i>
                    </div>

                    <div id="password-section" class="collapse">
                        @include('components.page-sections.profile.form-change-password', ['user' => $user])
                    </div>

                </div>
            @endif
        </div>
    </div>
</x-layout>
