// script.js

document.addEventListener('DOMContentLoaded', function() {
    const nav = document.querySelector('.navbar-scroll');
    window.addEventListener('scroll', () => {
        if (window.scrollY >= 56) {
            nav.classList.add('navbar-bg-dark');
        } else {
            nav.classList.remove('navbar-bg-dark');
        }
    });
});


