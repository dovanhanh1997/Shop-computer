function increaseQty(productId) {
    let qty = 0;
    let value = document.getElementById(productId + 'qty').value;
    if (parseInt(value) >= 1 && parseInt(value) < 100) {
        qty = parseInt(value) + 1;
        return document.getElementById(productId + 'qty').value = qty;
    }
}

function decreaseQty(productId) {
    let qty = 0;
    let value = document.getElementById(productId + 'qty').value;
    if (parseInt(value) > 1 && parseInt(value) < 100) {
        qty = parseInt(value) - 1;
        return document.getElementById(productId + 'qty').value = qty;
    }
}
