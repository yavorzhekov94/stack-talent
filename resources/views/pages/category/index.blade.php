<x-layout>
    @push('scripts')
        @vite(['resources/js/pages/category/delete-categories.js',
                'resources/js/pages/category/add-categories.js',
                'resources/js/pages/category/edit-categories.js',
                'resources/js/pages/category/pagination.js'])
    @endpush
    <div class="container-fluid bg-light min-vh-100 py-5">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded">
            <x-page-heading>All Categories</x-page-heading>

            <div id="category-container" class="table-responsive">
                @include('components.page-sections.category.table', ['categories' => $categories])
            </div>

            @can('create', \App\Models\Category::class)
                <div class="text-end mt-4">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>
                </div>
                @include('pages.category.create')
            @endcan
        </div>
    </div>
        @include('pages.category.edit')
</x-layout>
