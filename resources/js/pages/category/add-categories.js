document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add-category-form');
    const url = form.getAttribute('action');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || 'Failed to add category.');
                    });
                }
                return response.json(); // 👈 важно: тук взимаме `data`
            })
            .then(data => {
                const row = document.createElement('tr');
                row.id = `category-row-${data.id}`;
                row.innerHTML = `
                <td>${data.name}</td>
                <td>${data.slug}</td>
                <td>${data.description ?? ''}</td>
                <td><i class="${data.icon ?? ''}"></i></td>
                <td><span class="badge ${data.is_active ? 'bg-success' : 'bg-secondary'}">${data.is_active ? 'Yes' : 'No'}</span></td>
                <td class="text-end">
                    <button class="btn btn-sm btn-outline-primary edit-btn" data-id="${data.id}">Edit</button>
                    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${data.id}">Delete</button>
                </td>
            `;

                document.getElementById('category-table').appendChild(row);

                const modal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
                modal.hide();

                form.reset();
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Something went wrong.');
            });
    });
});
