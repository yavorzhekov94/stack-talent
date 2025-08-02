document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {
            const modal = document.getElementById('editCategoryModal');

            const id = this.dataset.id;
            const name = this.dataset.name;
            const description = this.dataset.description;
            const icon = this.dataset.icon;
            const isActive = this.dataset.is_active === '1';
            
            modal.querySelector('form').action = `/categories/${id}`;
            modal.querySelector('[name="name"]').value = name;
            modal.querySelector('[name="description"]').value = description ?? '';
            modal.querySelector('[name="icon"]').value = icon ?? '';
            modal.querySelector('[name="is_active"]').checked = isActive;
        });
    });
});
