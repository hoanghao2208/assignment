window.addEventListener("load", function() {
    //click on menu
    const menuList = document.querySelectorAll(".header-bottom ul li a")
    menuList.forEach((item) => item.addEventListener("click", function(e) {
        menuList.forEach((item) => item.classList.remove("current"));
        e.target.classList.add("current");
    }));

    const triggerBtn = document.querySelector(".trigger");
    const menuBar = document.querySelector(".menu-list");
    const closeBtn = document.querySelector(".menu-list .close");
    triggerBtn.addEventListener("click", function() {
        menuBar.classList.add("show");
    })
    closeBtn.addEventListener("click", function() {
        menuBar.classList.remove("show");
    })


     ////////////////////////////////////////////
     const cart = document.querySelector(".header .cart-button");
     const menuCart = document.querySelector(".main .product-cart");
     const closeCart = document.querySelector(".main .close-menu");
     
     cart.addEventListener("click", function() {
         menuCart.classList.add("active");
     })
     closeCart.addEventListener("click", function() {
         menuCart.classList.remove("active");
     })

     
})