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
const minusButton = document.querySelector('.minus');
const plusButton = document.querySelector('.plus');
let valueInput = document.querySelector('.act-value');

plusButton.addEventListener("click", function() {
    valueInput.value++;
})
minusButton.addEventListener("click", function() {
    if(valueInput.value === "1")
        return;
    valueInput.value--;
})

// push on comment
window.addEventListener("load", function() {
    const submitBtn = document.querySelector(".submit-button");
    const userName = document.querySelector("#name");
    const summary = document.querySelector("#sum");
    const review = document.querySelector("#review");
    const blockReview = document.querySelector(".review-block-body ul");

    let feedBackArr = [];
    submitBtn.addEventListener("click", submitFeedBack);

    function submitFeedBack(e) {
        //get user name
        e.preventDefault();
        const userForm = userName.value;
        const sumForm = summary.value;
        const reviewForm = review.value;

        if(userForm && sumForm && review !== "") {
            //create new feedback
            newFeedback = {
                "id": Math.floor((Math.random() * 1000) + 1),
                "userName": userForm,
                "userSum": sumForm,
                "userReview": reviewForm,
            }
            createComment(newFeedback);
            feedBackArr.push(newFeedback);
            resetForm();
        }
    }


    function resetForm() {
        userName.value = "";
        summary.value = "";
        review.value = "";
    }

    function createComment(item) {
        const today = new Date();
        const li = document.createElement('li');
        li.classList = 'item';
        li.innerHTML = `
        <div class="review-form">
            <p class="person">Review by ${item.userName}</p>
            <div class="mini-text">ON ${today.getDate()}/${today.getMonth()+1}/${today.getFullYear()}</div>
        </div>
        <div class="review-rating rating">
            <div class="stars"></div>
        </div>
        <div class="review-title">${item.userSum}</div>
        <div class="review-text">
            <p>${item.userReview}</p>
        </div>`

        blockReview.insertAdjacentElement('beforeend', li);
    }

    ///////////////////////////////////////////
    const addBtn = document.querySelector(".detail-product .button-cart .button-add");
    const productName = document.querySelector(".detail-product .product-name");
    const price = document.querySelector(".detail-product .price .current");
    const numProduct = document.querySelector(".detail-product .qty-control .act-value");
    const origin = document.querySelector(".detail-product .origin .where");
    const picture = document.querySelector(".detail-product .big-image .picture");
    const itemBlock = document.querySelector(".main .cart-table tbody");

    let priceItem = document.querySelector(".main .products .item-cost");
    let shipItem = document.querySelector(".main .products .ship-cost");
    let saleItem = document.querySelector(".main .products .sale-cost");
    let total = document.querySelector(".main .products .total-cost");
    let quantity = document.querySelector('.header .qt');

    let productArr = [];
    addBtn.addEventListener("click", addToCart);

    function creatItemInCart(item) {
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <td>
             <div class="image-product">
                 <a href="#"><img src=${item.src} alt=""></a>
             </div>
             <div class="content">
                 <strong><a href="#">${item.name}</a></strong>
                 <p>Origin: ${item.where}</p>
             </div>
         </td>
         <td class="price">$${(item.price)}</td>
         <td>
             <div class="control">
                 <button class="minus">-</button>
                 <input type="text" value="${item.count}" class="act-value">
                 <button class="plus">+</button>
             </div>
         </td>
         <td class="total">$${(item.price * item.count).toFixed(2)}</td>
         <td><i class="ri-delete-bin-line removeBtn"></i></td>`

         itemBlock.insertAdjacentElement("afterbegin", tr);
    }

    function addToCart(e) {
        e.preventDefault();
        const newProduct = {
            "id": Math.floor((Math.random() * 1000) + 1),
            "src": picture.href,
            "name": productName.textContent,
            "where": origin.textContent,
            "price": price.textContent,
            "count": numProduct.value,
        }
        if(checkDuplicate(productArr, newProduct) === true) {
            for(let i = 0; i < productArr.length; i++) {
                if(productArr[i].name === newProduct.name) {
                    productArr.count += newProduct.count;
                }
            }
        }
        else {
            productArr.push(newProduct);
            creatItemInCart(newProduct);
            quantity.textContent++;
        }
        let totalPrice = 0;
        let totalItem = 0;
        if(productArr.length > 0) {
            [...productArr].forEach((item) => {
                totalPrice = totalPrice + item.price * item.count;
                priceItem.innerText = "$"+(totalPrice.toFixed(2).toLocaleString());
                shipItem.innerText = "$14.00";
                saleItem.innerText = "- $20.00";
                total.innerText = "$"+((totalPrice + 14 - 20).toFixed(2).toLocaleString());
            })
        }
    }

    function checkDuplicate(arr, pro) {
        for(let i = 0; i < arr.length; i++) {
            if(arr[i].name === pro.name)
                return true;
        }
        return false;
    }
    
    itemBlock.addEventListener("click", function(e){
        if(e.target.matches(".removeBtn")) {
            const toRemove = e.target.parentNode.parentNode;
            toRemove.parentNode.removeChild(toRemove);
            quantity.textContent--;
        }   
        if(e.target.matches(".minus")) {
            if(e.target.nextElementSibling.value == 1)
                return;
            e.target.nextElementSibling.value--;
            let numIt = e.target.nextElementSibling.value;
            const changePrice = e.target.parentNode.parentNode.nextElementSibling;
            const newPrice = (parseFloat(numIt) * parseFloat(price.textContent)).toFixed(2);
            changePrice.textContent = newPrice;
        }
        if(e.target.matches(".plus")) {
            e.target.previousElementSibling.value++;
            let numIt = e.target.previousElementSibling.value;
            const changePrice = e.target.parentNode.parentNode.nextElementSibling;
            const newPrice = (parseFloat(numIt) * parseFloat(price.textContent)).toFixed(2);
            changePrice.textContent = newPrice;
        }
    })
})

