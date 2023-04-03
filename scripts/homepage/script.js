// slick slider
$(document).ready(function(){
    $('.swiper-wrapper').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='ri-arrow-left-s-line'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='ri-arrow-right-s-line'></i></button>"
    });
});
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

