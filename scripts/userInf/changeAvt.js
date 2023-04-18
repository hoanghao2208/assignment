const image = document.querySelector('.main .avatar img');
const input = document.querySelector('.main .avatar input');

input.addEventListener('change', () => {
    image.src = URL.createObjectURL(input.files[0]);
})