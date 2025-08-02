<x-layout>
    @push('scripts')
        @vite(['resources/js/pages/category/delete-categories.js',
                'resources/js/pages/category/add-categories.js',
                'resources/js/pages/category/edit-categories.js'])
    @endpush
    <div class="container-fluid bg-light min-vh-100 py-5">
        <div class="register-card shadow-sm bg-white p-4 p-md-5 rounded">
            <x-page-heading>All Categories</x-page-heading>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="category-table">
                    @foreach($categories as $category)
                        <tr id="category-row-{{ $category->id }}">
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->description }}</td>
                            <td><i class="{{ $category->icon }}"></i></td>
                            <td>
                                @if($category->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td class="text-end">
                                @can('update', $category)
                                    <button
                                        class="btn btn-sm btn-outline-primary edit-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal"
                                        data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}"
                                        data-description="{{ $category->description }}"
                                        data-icon="{{ $category->icon }}"
                                        data-is_active="{{ $category->is_active }}">
                                        Edit
                                    </button>
                                @endcan
                                @can('delete', $category)
                                    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $category->id }}">Delete</button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
