const cartWrapper = document.querySelector('.cart-wrapper');
let currentCart = [];
window.addEventListener('click', function (event) {
    if (event.target.hasAttribute('data-cart')) {
        const card = event.target.closest('.catalogue-item');
        const productInfo = {
            id: card.dataset.id,
            imgSrc: card.querySelector('.product-img').getAttribute('src'),
            name: card.querySelector('h1').innerText,
            text: card.querySelector('p').innerText,
            price: card.querySelector('.price').innerText.split('$')[1],
            quantity: card.querySelector('.quantity').innerText
        }
        const itemInCart = cartWrapper.querySelector(`[data-id="${productInfo.id}"]`);
        if (itemInCart) {
            const quantity = itemInCart.querySelector('.quantity');
            const price = itemInCart.querySelector('.price');

            quantity.innerText = parseInt(quantity.innerText) + parseInt(productInfo.quantity);
            price.innerText = parseInt(quantity.innerText) * parseInt(productInfo.price);

            for (let i = 0; i < currentCart.length; i++) {
                if (currentCart[i].productId == productInfo.id) {
                    currentCart[i].productQuantity = quantity.innerText;
                    currentCart[i].productPrice = price.innerText;
                }
            }

        } else {
            let priceProductToCart=productInfo.quantity*productInfo.price;
            const cartItemHtml = `   
                    <li class="cart-item" data-id="${productInfo.id}">
                        <figure>
                            <img src="${productInfo.imgSrc}" alt="">
                        </figure>
                        <figcaption>
                            <h1>${productInfo.name}</h1>
                          </figcaption>
                        <div class="quantity">${productInfo.quantity}</div>
                        <div class="price">${priceProductToCart}</div>
                    </li>`;
            cartWrapper.insertAdjacentHTML('beforeend', cartItemHtml);
            currentCart.push({
                "productId": productInfo.id,
                "productQuantity": productInfo.quantity,
                "productSrc": productInfo.imgSrc,
                "productText": productInfo.text,
                "productName": productInfo.name,
                "productPrice": priceProductToCart
            });

        }
    }
    if (event.target.dataset.action == "post") {
        postUpdateCartProducts();
    }
    if (event.target.dataset.action == "delete-product") {
        postDeleteCartProducts(event);
    }
});

function postDeleteCartProducts(event) {
    $.post("../../../pet-store/inc/update-cart.php", null, function (data1) {
        if (data1 != "") {
            productInTheCart = JSON.parse(data1).currentCart;
        }
        const deletedProduct = event.target.closest('li');
        currentCart = productInTheCart.filter(product => deletedProduct.dataset.id != product.productId);
        location.href = "../../../pet-store/inc/redirectToCheckout.php?reload=tocheckout";
        $.post("../../../pet-store/inc/update-cart.php", {data: JSON.stringify({currentCart})});
    });

}
function postUpdateCartProducts() {
    $.post("../../../pet-store/inc/update-cart.php", null, function (data1) {
        let productsRemain = [];
        if (data1 != "") {
            productsRemain = JSON.parse(data1).currentCart;
        }
        if (productsRemain.length > 0) {
            currentCart = merge(currentCart, productsRemain, 'productId');
        }
        currentCart.forEach((product) => {
            let itemInCart = cartWrapper.querySelector(`[data-id="${product.productId}"]`);
            product.productQuantity = itemInCart.querySelector('.quantity').innerText;
            product.productPrice = itemInCart.querySelector('.price').innerText;
        });
        console.log(currentCart);
        console.log(productsRemain);
        $.post("../../../pet-store/inc/update-cart.php", {data: JSON.stringify({currentCart})}, function (data) {
        });
    });
}
function merge(a, b, prop) {
    let reduced = a.filter(function (aItem) {
        return !b.find(function (bItem) {
            return aItem[prop] === bItem[prop];
        });
    });
    return reduced.concat(b);
}

