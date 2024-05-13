/**
 * Navbar efeito
 */
const toggle = document.querySelectorAll('.toggle');
const navbar = document.querySelector('.navbar');

toggle.forEach(toggle => {
    toggle.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });
});

const dropdownUser = document.querySelector('.dropdown--user');
const dropdown = document.querySelector('.dropdown');

dropdownUser.addEventListener('click', () => {
    dropdown.classList.toggle('display');
});