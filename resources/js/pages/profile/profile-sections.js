document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.section-toggle');

    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const targetSelector = toggle.getAttribute('data-target');
            const target = document.querySelector(targetSelector);
            const icon = toggle.querySelector('.toggle-icon');

            if (target.classList.contains('show')) {
                target.classList.remove('show');
                icon.classList.remove('bi-chevron-up');
                icon.classList.add('bi-chevron-down');
            } else {
                target.classList.add('show');
                icon.classList.remove('bi-chevron-down');
                icon.classList.add('bi-chevron-up');
            }
        });
    });
});
