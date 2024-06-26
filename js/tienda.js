const cartIcon = document.querySelector('#cart-icon');
const cart = document.querySelector('.cart');
const closeCart = document.querySelector('#close-cart');

//Open cart
cartIcon.onclick = () => {
    cart.classList.add("active");
}
//Close cart
closeCart.onclick = () => {
    cart.classList.remove("active");
}

//Cart working JS
if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

//Making function
function ready() {
    //Remove items from cart
    const removeCartButtons = document.getElementsByClassName('cart-remove');
    console.log(removeCartButtons);
    for (let i = 0; i < removeCartButtons.length; i++) {
        const button = removeCartButtons[i]
        button.addEventListener('click', removeCartItem)
    }
    //Quantity changes
    const quantityInputs = document.getElementsByClassName('cart-quantity');
    
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }
    //Add to cart
    const addCart = document.getElementsByClassName('add-cart');
    for (let i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener('click', addCartClicked);
    }
    //Buy button work
    document.getElementsByClassName("btn-buy")[0].addEventListener("click", buyButtonClicked);
}
//Buy button
function buyButtonClicked() {
    alert('Tu orden de compra ha sido adquirida');
    const cartContent = document.getElementsByClassName('cart-content')[0];
    while (cartContent.hasChildNodes()) {
        cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
}
//Remove items from cart
function removeCartItem(event) {
    const buttonClicked = event.target
    buttonClicked.parentElement.remove();
    updateTotal();
}
//Quantity changes
function quantityChanged(event) {
    const input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }  
    updateTotal();
}
//Add to cart
function addCartClicked(event) {
    const button = event.target;
    const shopProducts = button.parentElement;
    const title = shopProducts.getElementsByClassName("product-title")[0].innerText;
    const price = shopProducts.getElementsByClassName("price")[0].innerText;
    const productImg = shopProducts.getElementsByClassName("product-img")[0].src;
    const description = shopProducts.getElementsByClassName("product-description")[0].innerText;
    const stock = shopProducts.getElementsByClassName("stock")[0].innerText;
    addProductToCart(title, price, productImg, description, stock);
    updateTotal();
}
function addProductToCart(title, price, productImg, description, stock) {
    const cartShopBox = document.createElement('div');
    cartShopBox.classList.add("cart-box");
    const cartItems = document.getElementsByClassName('cart-content')[0];
    const cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText == title) {
            alert('Ya tienes este producto en el carrito');
            return;
        }
    }
    var cartBoxContent = `
            <img src="${productImg}" alt="" class="cart-img">
            <div class="detail-box">
                <div class="cart-product-title">${title}</div>
                <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
            </div>
            <!--Remove cart-->
            <i class='bx bxs-trash-alt cart-remove'></i>`;
    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click', removeCartItem);        
    cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change', quantityChanged);        
}


//Update total
function updateTotal() {
    const cartContent = document.getElementsByClassName('cart-content')[0];
    const cartBoxes = cartContent.getElementsByClassName('cart-box');
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace("$", ""));
        var quantity = quantityElement.value;
        total = total + price * quantity;
    }   
    //If price contain some cents value
    total = Math.round(total * 100) / 100;

    document.getElementsByClassName('total-price')[0].innerText = "$" + total;
    
}