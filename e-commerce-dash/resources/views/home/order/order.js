const decrementBtns = document.querySelectorAll('.decrement-btn');
const incrementBtns = document.querySelectorAll('.increment-btn');
const quantityInputs = document.querySelectorAll('.quantity-input');

// Loop through each decrement button and add event listener
decrementBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        if (quantityInputs[index].value > 1) {
            quantityInputs[index].value--;
        }
        updateTotal();
    });
});

// Loop through each increment button and add event listener
incrementBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        quantityInputs[index].value++;
        updateTotal();
    });
});

// Remove item and update total
document.querySelectorAll('.remove-btn').forEach(button => {
    button.addEventListener('click', function () {
        this.closest('.cart-item').remove(); // Ensure we remove the entire cart item
        updateTotal();
    });
});

function updateTotal() {
    let subtotal = 0;
    let totalPoints = 0;
    const deliveryFee = parseFloat(document.querySelector('.delivery-amount').textContent.replace('SAR', ''));

    document.querySelectorAll('.cart-item').forEach((item, index) => {
        const price = parseFloat(item.querySelector('.price').textContent.replace('SAR', ''));
        const quantity = parseInt(quantityInputs[index].value);
        const points = parseInt(item.querySelector('.points').textContent.replace(' Points', ''));

        subtotal += price * quantity;
        totalPoints += points * quantity;
    });

    const total = subtotal + deliveryFee;

    document.querySelector('.subtotal-amount').textContent = subtotal.toFixed(2) + ' SAR';
    document.querySelector('.total-amount').textContent = total.toFixed(2) + ' SAR';
    document.querySelector('.points-earned').textContent = totalPoints;
}

// Initial update to set correct values on page load
updateTotal();
