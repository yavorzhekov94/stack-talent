document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('document-upload-form');
    const list = document.getElementById('documents-list');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function loadDocuments() {
        fetch('/documents')
            .then(res => res.json())
            .then(data => {
                list.innerHTML = data.map(doc => {
                    const fileName = doc.file_path.split('/').pop();
                    return `
                        <div class="border p-2 d-flex justify-content-between align-items-center">
                            <div>
                                <strong>${doc.file_type}</strong> -
                                <a href="/documents/${doc.id}/download" target="_blank">
                                    ${doc.original_name}
                                </a>
                                ${doc.is_primary ? '<span class="badge bg-primary ms-2">Primary</span>' : ''}
                            </div>
                            <button class="btn btn-sm btn-danger" data-id="${doc.id}">Delete</button>
                        </div>
                            `;
                }).join('');
            });
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch('/documents', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData,
        })
            .then(async res => {
                if (!res.ok) {
                    const errorData = await res.json();
                    throw errorData;
                }
                return res.json();
            })
            .then(() => {
                form.reset();
                loadDocuments();
            })
            .catch(err => {
            let msg = 'Please, upload file with valid format.';
            if (err.errors && err.errors.file) {
                msg = err.errors.file.join(', ');
            }
                return `
                        <div class="border p-2">
                            <strong>${msg}</strong>
                        </div>
                            `;
        });
    });

    list.addEventListener('click', function (e) {
        if (e.target.tagName === 'BUTTON') {
            const id = e.target.dataset.id;
            fetch(`/documents/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken }
            })
                .then(() => loadDocuments());
        }
    });

    loadDocuments();
});
