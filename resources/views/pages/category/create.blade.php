<x-layout>
    @push('scripts')
        @vite(['resources/js/pages/auth-toggle-password.js'])
    @endpush
    <div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded">
            <x-page-heading>Create Category</x-page-heading>

            {{-- Laravel Create Category Form --}}
            <x-forms.form method="POST" action="{{ route('category.store') }}">

                <x-row>
                    <x-forms.input label="Category name" name="name" required />
                    <x-forms.input label="Slug" name="slug" required />
                    <x-forms.textarea label="Description" name="description"></x-forms.textarea>
                    <x-forms.input label="Icon" name="icon" />
                    <x-forms.checkbox label="Is active" name="is_active" />
                </x-row>
                <x-forms.button>Create Category</x-forms.button>
            </x-forms.form>

        </div>
    </div>
</x-layout>
