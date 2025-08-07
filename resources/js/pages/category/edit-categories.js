document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('edit-category-form');

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('edit-btn')) {
            const button = e.target;
            const modal = document.getElementById('editCategoryModal');

            const id = button.dataset.id;
            const name = button.dataset.name;
            const description = button.dataset.description;
            const icon = button.dataset.icon;
            const isActive = button.dataset.is_active === '1';

            form.action = `/categories/${id}`;
            form.dataset.method = 'POST'; // или 'PUT' ако Laravel очаква PUT

            form.querySelector('[name="name"]').value = name;
            form.querySelector('[name="description"]').value = description ?? '';
            form.querySelector('[name="icon"]').value = icon ?? '';
            form.querySelector('[name="is_active"]').checked = isActive;

            const bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const method = form.dataset.method || 'POST';
        const url = form.getAttribute('action');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(form);

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(response => {
                if (!response.ok) throw response;
                return response.json();
            })
            .then(data => {
                const row = document.getElementById(`category-row-${data.id}`);
                if (row) {
                    row.innerHTML = `
                        <td>${data.name}</td>
                        <td>${data.slug}</td>
                        <td>${data.description ?? ''}</td>
                        <td><i class="${data.icon ?? ''}"></i>${data.icon ?? ''}</td>
                        <td><span class="badge ${data.is_active ? 'bg-success' : 'bg-secondary'}">${data.is_active ? 'Yes' : 'No'}</span></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary edit-btn"
                                    data-id="${data.id}"
                                    data-name="${data.name}"
                                    data-description="${data.description ?? ''}"
                                    data-icon="${data.icon ?? ''}"
                                    data-is_active="${data.is_active ? 1 : 0}">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${data.id}">Delete</button>
                        </td>
                    `;
                }

                const modalInstance = bootstrap.Modal.getInstance(document.getElementById('editCategoryModal'));
                modalInstance.hide();
                
                setTimeout(() => {
                    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                    document.body.classList.remove('modal-open');
                    document.body.style.paddingRight = '';
                }, 500);
            })
            .catch(async (error) => {
                if (error.json) {
                    const data = await error.json();
                    alert(data.message || 'Update failed.');
                } else {
                    console.error('Update error:', error);
                    alert('Something went wrong.');
                }
            });
    });
});
