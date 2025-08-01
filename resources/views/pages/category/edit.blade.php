<!-- Edit Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-forms.form id="edit-category-form" method="PATCH">
                    <input type="hidden" name="id" id="edit-id">
                    <x-row>
                        <x-forms.input label="Category name" name="name" id="edit-name" required />
                        <x-forms.textarea label="Description" name="description" id="edit-description" />
                        <x-forms.input label="Icon" name="icon" id="edit-icon" />
                        <x-forms.checkbox label="Is active" name="is_active" id="edit-is-active" />
                    </x-row>
                    <x-forms.button>Save</x-forms.button>
                    <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Cancel</button>
                </x-forms.form>
            </div>
        </div>
    </div>
</div>
