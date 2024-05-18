/**
 * Navbar efeito
 */
const toggle = document.querySelectorAll('.toggle');
const navbar = document.querySelector('.navbar');
const foot = document.querySelectorAll('.form-group');
const footer = document.querySelector('.footer');

foot.forEach(div => {
    if(div.classList.contains('foot')) {
        footer.id = 'footer-form';
    }
});

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
