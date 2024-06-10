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