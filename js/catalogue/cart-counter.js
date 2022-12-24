
window.addEventListener('click', function (event) {

    if(event.target.dataset.action == 'minus'||event.target.dataset.action == 'plus'){
        const arrowContainer=event.target.closest('.arrow-container');
        const quantity=arrowContainer.querySelector('.quantity');
        if (event.target.dataset.action == 'plus') {
            quantity.textContent= ++quantity.textContent;
        }
        if(event.target.dataset.action == 'minus') {
            if(parseInt(quantity.textContent)>1){ quantity.textContent= --quantity.textContent;}
        }
    }

})
