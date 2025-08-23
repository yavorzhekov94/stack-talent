<x-layout>
    <div class="container">
        <x-section-heading> Create new job</x-section-heading>
        <x-forms.form
            id="add-jobs-form"
            method="POST"
            action="{{ route('jobs.store') }}">
            <x-row>
                <x-forms.input label="Job Title" name="title" required />
                <x-forms.textarea label="Description" name="description" required></x-forms.textarea>
                <x-forms.textarea label="Requirements" name="requirements" required></x-forms.textarea>
                <x-forms.input label="Location" name="location" required />
                <x-forms.input label="Salary min" name="salary_min" type="number" min="0" step="0.01" />
                <x-forms.input label="Salary max" name="salary_max" type="number" min="0" step="0.01" />
                <x-forms.select label="Category" name="category_id" required>
                    <option value="">Choose category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select label="Job type" name="type" >
                    @foreach(config('job_type') as $job_type_code => $job_type_name)
                        <option
                            value="{{ $job_type_code }}"
                        >
                            {{ $job_type_name }}
                        </option>
                    @endforeach
                </x-forms.select>
                <x-forms.checkbox
                    label="Is remote"
                    name="is_remote"
                />
            </x-row>
            <x-forms.button>Create</x-forms.button>
            <button type="button" class="btn btn-secondary ms-2">Cancel</button>
        </x-forms.form>
    </div>
</x-layout>
