document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('category-table');
    const form = document.getElementById('edit-category-form');

    // send data to modal
    table.addEventListener('click', function (e) {
        if (e.target.classList.contains('edit-btn')) {
            const button = e.target;
            const modal = document.getElementById('editCategoryModal');

            const id = button.dataset.id;
            const name = button.dataset.name;
            const description = button.dataset.description;
            const icon = button.dataset.icon;
            const isActive = button.dataset.is_active === '1';

            const method =

            modal.querySelector('form').action = `/categories/${id}`;
            modal.querySelector('[name="name"]').value = name;
            modal.querySelector('[name="description"]').value = description ?? '';
            modal.querySelector('[name="icon"]').value = icon ?? '';
            modal.querySelector('[name="is_active"]').checked = isActive;

            // fetch(`/categories/${id}` {
            //     method:
            // })
        }
    });

    //Update category async logic
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formMethod = form.dataset.method;
        console.log(formMethod);

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(form);
        console.log(formData.get('icon'));
        const url = form.getAttribute('action');

        fetch (url, {
           method:  formMethod,
           headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
           },
            body: formData
        }).then(response => {
            if (!response.ok) throw response;
            return response.json();
        }).then(data => {
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

            const modal = bootstrap.Modal.getInstance(document.getElementById('editCategoryModal'));
            modal.hide();

        }).catch(async (error) => {
            if (error.json) {
                const data = await error.json();
                alert(data.message || 'Update failed.');
            } else {
                console.error('Error:', error);
                alert('Something went wrong.');
            }
        });
    });

});
