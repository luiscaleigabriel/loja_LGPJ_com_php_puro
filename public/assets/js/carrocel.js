const prev = document.querySelector('#prev');
const next = document.querySelector('#next');

next.addEventListener('click', () => {
    const items = document.querySelectorAll('.carrocel--slider__slide');

    document.querySelector('.carrocel--slider').appendChild(items[0]);

});

prev.addEventListener('click', () => {
    const items = document.querySelectorAll('.carrocel--slider__slide');

    document.querySelector('.carrocel--slider').prepend(items[items.length - 1]);

});

setInterval(() => {
    const items = document.querySelectorAll('.carrocel--slider__slide');

    document.querySelector('.carrocel--slider').appendChild(items[0]);
},30000);