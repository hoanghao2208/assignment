// open window add new address
const addBtn = document.querySelector(".main .wrap-header .add-new");
const closeBtn = document.querySelector(".main .wrap-newAdd .close-item");
const addWindow = document.querySelector(".wrap-newAdd");

addBtn.addEventListener("click", function() {
    addWindow.classList.add("show");
})
closeBtn.addEventListener("click", function() {
    addWindow.classList.remove("show");
})

// push new address into wrap-item
const wrapItem = document.querySelector(".wrap-item");
const submitBtn = document.querySelector(".wrap-newAdd .add-new");
const newName = document.querySelector(".wrap-newAdd .newName");
const newPhone = document.querySelector(".wrap-newAdd .newPhone");
const newLocation = document.querySelector(".wrap-newAdd .newLocation");
const newAdd = document.querySelector(".wrap-newAdd .newAdd");
const overlay = document.querySelector(".overlay");

submitBtn.addEventListener("click", function(e) {
    e.preventDefault();
    const div = document.createElement('div');
    div.classList = 'item';
    if(newName.value && newPhone.value && newLocation.value && newAdd.value) {
        div.innerHTML = `
        <div class="content">
            <p class="name"><span>Name: </span><span class="yourName">${newName.value}</span></p>
            <p class="phone"><span>Phone: </span><span class="yourPhone">${newPhone.value}</span></p>
            <p class="location"><span class="yourLocation">${newLocation.value}</span></p>
            <p class="address"><span class="yourAddress">${newAdd.value}</span></p>
        </div>
        <div class="button">
            <button class="choose">Select</button>
            <button class="del">Delete</button>
        </div>
        `
        wrapItem.insertAdjacentElement('afterbegin', div);
        newName.value = "";
        newPhone.value = "";
        newLocation.value = "";
        newAdd.value = "";
        addWindow.classList.remove("show");
    }
    else {
        alert("You cannot leave these fields blank");
    }
})

overlay.addEventListener("click", function(e) {
    addWindow.classList.remove("show");
})

// delete address form wrap-add
wrapItem.addEventListener("click", function(e) {
    if(e.target.matches(".del")) {
        const delItem = e.target.parentNode.parentNode;
        delItem.parentNode.removeChild(delItem);
    }
    if(e.target.matches(".choose")) {
        e.target.textContent = "Selected";
    }
})