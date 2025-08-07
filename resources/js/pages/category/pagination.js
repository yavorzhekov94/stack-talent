document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (e) {
        const link = e.target.closest('a.page-link');

        if (link && link.closest('.pagination')) {
            e.preventDefault();
            const url = link.getAttribute('href');

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    const container = document.querySelector('#category-container');
                    container.innerHTML = data.html;
                })
                .catch(error => console.error('Pagination error:', error));
        }
    });
});
