/**
 * Navbar efeito
 */
const toggle = document.querySelector('#toggle');
const navbar = document.querySelector('.navbar');

toggle.addEventListener('click', () => {
    navbar.classList.toggle('active');
});

const dropdownUser = document.querySelector('.dropdown--user');
const dropdown = document.querySelector('.dropdown');

dropdownUser.addEventListener('click', () => {
    dropdown.classList.toggle('display');
});