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
            <td><i class="{{ $category->icon }}"></i>{{ $category->icon }}</td>
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

<div class="d-flex justify-content-end">
    {{ $categories->links() }}
</div>
