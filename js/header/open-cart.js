
window.addEventListener('click', function (event) {

    if (event.target.dataset.action=="openCart") {
        const cart_preview = document.querySelector('.cart-preview');
        if (cart_preview.isOpen == "open") {
            cart_preview.style.display = 'none';
            cart_preview.isOpen = "closed";
        } else {
            cart_preview.style.display = 'flex'
            cart_preview.isOpen = "open";
        }
    }
});

