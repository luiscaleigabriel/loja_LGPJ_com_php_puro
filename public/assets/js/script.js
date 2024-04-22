/*
* Menu dropdown
*/
const navDropdownListBtn = document.querySelectorAll('.nav--dropdown--list__btn');
const navDropdownLi = document.querySelectorAll('.nav--dropdown--menu__item');

navDropdownListBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        
        let brother = btn.parentElement.children[1];

        if (!btn.classList.contains('dropdown--active')) {
            navDropdownListBtn.forEach(btn => {
                if (btn.classList.contains('dropdown--active')) {
                    btn.classList.remove('dropdown--active');
                    btn.parentElement.children[1].classList.remove('dropdown--active');
                }
            });
            btn.classList.add('dropdown--active');
            brother.classList.add('dropdown--active');
        } else {
            btn.classList.remove('dropdown--active');
            brother.classList.remove('dropdown--active');
        }

    });
});

navDropdownLi.forEach(li => {
    li.addEventListener('click', () => {
        let pather = li.parentElement;
        
        if (pather.classList.contains('dropdown--active')) {
            pather.classList.remove('dropdown--active');
            navDropdownListBtn.forEach(btn => {
                if (btn.classList.contains('dropdown--active')) {
                    btn.classList.remove('dropdown--active');
                }
            });
        }

    });
});

/*
* Menu Mobile
*/

const toggle = document.querySelector('#toggle');
const navMobile = document.querySelector('#nav--mobile');
const navMobileListBtn = document.querySelectorAll('.nav-mobile--list__btn');

toggle.addEventListener('click', () => {
    toggle.classList.toggle('activeMenu');
    navMobile.classList.toggle('activeMenu');
});

function openCloseMobile() {
    toggle.classList.toggle('activeMenu');
    navMobile.classList.toggle('activeMenu');
}

navMobileListBtn.forEach(btn => {
    btn.addEventListener('click', () => {

        brother = btn.parentElement.children[1];

        if (!btn.classList.contains('activeMenu')) {
            droplistBtn.forEach(btn => {
                btn.classList.remove('activeMenu');
                btn.parentElement.children[1].classList.remove('activeMenu');
            });
            btn.classList.add('activeMenu');
            brother.classList.add('activeMenu');
        } else {
            brother.classList.remove('activeMenu');
            btn.classList.remove('activeMenu');
        }    

    });
});


function closeMenuDropdown() {
    navMobileListBtn.forEach(btnM => {
        btnM.classList.remove('activeMenu');

        btnM.parentElement.children[1].classList.remove('activeMenu');
    });
}

/*
* product-description
*/

const btnsDescription = document.querySelectorAll('.btn_desc');
const oneBtn = document.querySelector('#one');
const twoBtn = document.querySelector('#two');
const threeBtn = document.querySelector('#three');
const one = document.querySelector('.one');
const two = document.querySelector('.two');
const three = document.querySelector('.three');

btnsDescription.forEach(btnDescription => {
    btnDescription.addEventListener('click', () => {

        if (btnDescription.id == 'one') {

            btnDescription.style.backgroundColor = '#fff';
            twoBtn.style.backgroundColor = 'transparent';
            threeBtn.style.backgroundColor = 'transparent';

            one.style.display = 'block';
            two.style.display = 'none';
            three.style.display = 'none';

        } else if(btnDescription.id == 'two') {

            btnDescription.style.backgroundColor = '#fff';
            oneBtn.style.backgroundColor = 'transparent';
            threeBtn.style.backgroundColor = 'transparent';

            two.style.display = 'block';
            one.style.display = 'none';
            three.style.display = 'none';

        } else if(btnDescription.id == 'three') {

            btnDescription.style.backgroundColor = '#fff';
            twoBtn.style.backgroundColor = 'transparent';
            twoBtn.style.backgroundColor = 'transparent';

            three.style.display = 'block';
            two.style.display = 'none';
            one.style.display = 'none';

        }
    });
});

/*
* droplist--list
*/

const droplistBtn = document.querySelectorAll('.droplist__btn');

droplistBtn.forEach(btn => {
    btn.addEventListener('click', () => {

        brother = btn.parentElement.children[1];

        if (!brother.classList.contains('droplist--open')) {
            droplistBtn.forEach(btn => {
                btn.parentElement.children[1].classList.remove('droplist--open');
            });
            brother.classList.add('droplist--open');
        } else {
            brother.classList.remove('droplist--open');
        }    

    });
});