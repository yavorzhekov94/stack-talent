<x-forms.form id="document-upload-form" enctype="multipart/form-data">
    <x-row>
        <x-forms.input label="Document Type" name="file_type" required />
        <x-forms.input label="File" name="file" type="file" required />
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="is_primary" id="is_primary">
            <label class="form-check-label" for="is_primary">Primary</label>
        </div>
    </x-row>
    <x-forms.button>Upload</x-forms.button>
</x-forms.form>

<div id="documents-list" class="mt-4"></div>
