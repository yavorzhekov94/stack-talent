document.getElementById('category-table').addEventListener('click', function (e) {
    if (e.target.classList.contains('delete-btn')) {
        const categoryId = e.target.dataset.id;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (!confirm('Are you sure you want to delete this category?')) return;

        fetch(`/categories/${categoryId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
            .then(response => {
                if (response.ok) {
                    const row = document.getElementById(`category-row-${categoryId}`);
                    if (row) row.remove();
                } else {
                    return response.json().then(data => {
                        alert(data.message || 'Failed to delete category.');
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong.');
            });
    }
});
