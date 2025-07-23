<x-forms.form id="document-upload-form" enctype="multipart/form-data">
    <x-row>
        <x-forms.select label="Document Type" name="file_type" required >
            @foreach (config('document_types') as $doc_code => $doc_name)
                <option
                    value="{{ $doc_name }}"
                >
                    {{ $doc_name }}
                </option>
            @endforeach
        </x-forms.select>
        <x-forms.input label="File" name="file" type="file" required />
        <x-forms.checkbox
            label="Primary"
            name="is_primary"
        />
    </x-row>
    <x-forms.button>Upload</x-forms.button>
</x-forms.form>

<div id="documents-list" class="mt-4"></div>
