document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('document-upload-form');
    const list = document.getElementById('documents-list');

    function loadDocuments() {
        fetch('/documents')
            .then(res => res.json())
            .then(data => {
                list.innerHTML = data.map(doc => `
                    <div class="border p-2 d-flex justify-content-between align-items-center">
                        <div>
                            <strong>${doc.file_type}</strong> - ${doc.file_path}
                            ${doc.is_primary ? '<span class="badge bg-primary ms-2">Primary</span>' : ''}
                        </div>
                        <button class="btn btn-sm btn-danger" data-id="${doc.id}">Delete</button>
                    </div>
                `).join('');
            });
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        fetch('/documents', {
            method: 'POST',
            body: formData,
        })
            .then(res => res.json())
            .then(() => {
                form.reset();
                loadDocuments();
            });
    });

    list.addEventListener('click', function (e) {
        if (e.target.tagName === 'BUTTON') {
            const id = e.target.dataset.id;
            fetch(`/documents/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
            })
                .then(() => loadDocuments());
        }
    });

    loadDocuments();
});
