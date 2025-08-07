{{-- Modal for creating category --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-forms.form
                    id="add-category-form"
                    method="POST"
                    action="{{ route('categories.store') }}"
                    data-url="{{ route('categories.store') }}"
                    data-method="POST">
                    <x-row>
                        <x-forms.input label="Category name" name="name" required />
                        <x-forms.textarea label="Description" name="description"></x-forms.textarea>
                        <x-forms.input label="Icon" name="icon" />
                        <x-forms.checkbox label="Is active" name="is_active" />
                    </x-row>
                    <x-forms.button>Create</x-forms.button>
                    <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Cancel</button>
                </x-forms.form>
            </div>
        </div>
    </div>
</div>
