// window.toggleTheme = function () {
//     const html = document.documentElement;
//     const icon = document.querySelector('.theme-toggle i');
//     const theme = html.getAttribute('data-bs-theme');

//     if (theme === 'dark') {
//         html.setAttribute('data-bs-theme', 'light');
//         icon.classList.replace('bi-moon-stars', 'bi-sun');
//         localStorage.setItem('theme', 'light');
//     } else {
//         html.setAttribute('data-bs-theme', 'dark');
//         icon.classList.replace('bi-sun', 'bi-moon-stars');
//         localStorage.setItem('theme', 'dark');
//     }
// };

window.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');

    if (savedTheme) {
        document.documentElement.setAttribute('data-bs-theme', savedTheme);
    }
});