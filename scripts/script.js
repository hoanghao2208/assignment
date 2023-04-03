//click on menu
const menuList = document.querySelectorAll(".header-bottom ul li a")
menuList.forEach((item) => item.addEventListener("click", function(e) {
    menuList.forEach((item) => item.classList.remove("current"));
    e.target.classList.add("current");
}));


// show-hide menu
const trigger = document.querySelector(".trigger");
const menu = document.querySelector(".menu-list");
const close = document.querySelector(".close");

trigger.addEventListener("click", function() {
    menu.classList.toggle("show");
})

close.addEventListener("click",function() {
    menu.classList.remove("show");
})

document.addEventListener("click", handleClickOutMenu);
function handleClickOutMenu(event) {
    if(!menu.contains(event.target) && !event.target.matches(trigger)) {
        menu.classList.remove("show");
    }
}

// slider
const swiper = new Swiper('.swiper', {
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
});

//product image slider
let productThumb = new Swiper(".small-image", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
        481: {
            spaceBetween: 32,
        }
    }
});
let productBig = new Swiper(".big-image", {
    loop: true,
    autoHeight: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: productThumb,
    }
})

// Expand menu
const subMenu = document.querySelectorAll('.has-child .icon-small');
subMenu.forEach((menu) => menu.addEventListener('click', toggle));

function toggle(e) {
    e.preventDefault();
    subMenu.forEach((item) => item != this ? item.closest('.has-child').classList.remove('expand') : null);
    if(this.closest('.has-child').classList != 'expand')
        this.closest('.has-child').classList.toggle('expand');
}

// minus and plus
const minusButton = document.querySelector('.detail-product .qty-control .minus');
const plusButton = document.querySelector('.detail-product .qty-control .plus');
let valueInput = document.querySelector('.detail-product .qty-control .act-value');

plusButton.addEventListener("click", function() {
    valueInput.value++;
})
minusButton.addEventListener("click", function() {
    if(valueInput.value === "1")
        return;
    valueInput.value--;
})