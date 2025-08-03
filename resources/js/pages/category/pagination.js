document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (e) {
        if (e.target.tagName === 'A' && e.target.closest('.pagination')) {
            e.preventDefault();
            const url = e.target.getAttribute('href');

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTable = doc.querySelector('#category-container');
                    document.querySelector('#category-container').innerHTML = newTable.innerHTML;
                })
                .catch(error => console.error('Pagination error:', error));
        }
    });
});
