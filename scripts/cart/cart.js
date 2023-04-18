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

})

