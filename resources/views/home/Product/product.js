const thumbnails = document.querySelectorAll('.carousel img');
let currentIndex = 0;

document.querySelector('.carousel-control-prev').addEventListener('click', () => {
    currentIndex = (currentIndex === 0) ? thumbnails.length - 1 : currentIndex - 1;
    updateCarousel();
});

document.querySelector('.carousel-control-next').addEventListener('click', () => {
    currentIndex = (currentIndex === thumbnails.length - 1) ? 0 : currentIndex + 1;
    updateCarousel();
});

thumbnails.forEach((img, index) => {
    img.addEventListener('click', function() {
        currentIndex = index;
        updateCarousel();
    });
});

function updateCarousel() {
    // Update the main product image
    document.querySelector('.product-image img').src = thumbnails[currentIndex].src;

    thumbnails.forEach((img, index) => {
        img.classList.remove('active-thumbnail');
    
        // Calculate the index of the images that should be displayed
        const startIndex = currentIndex;
        const endIndex = (currentIndex + 4) % thumbnails.length;
    
        if (startIndex < endIndex) {
            // Normal case, when startIndex and endIndex are in order
            if (index >= startIndex && index < startIndex + 4) {
                img.style.display = 'block'; // Show the thumbnail
            } else {
                img.style.display = 'none'; // Hide the thumbnail
            }
        } else {
            // Wrap around case, when the endIndex loops back to the start of the array
            if (index >= startIndex || index < endIndex) {
                img.style.display = 'block'; // Show the thumbnail
            } else {
                img.style.display = 'none'; // Hide the thumbnail
            }
        }
    });
    
    // Mark the current thumbnail as active
    thumbnails[currentIndex].classList.add('active-thumbnail');
}    
    

// Initial call to set up the carousel
updateCarousel();


const decrementBtn = document.querySelector('.decrement-btn');
const incrementBtn = document.querySelector('.increment-btn');
const quantityInput = document.querySelector('.quantity-input');

decrementBtn.addEventListener('click', () => {
    if (quantityInput.value > 1) {
        quantityInput.value--;
    }
});

incrementBtn.addEventListener('click', () => {
    quantityInput.value++;
});


const addToCart = document.querySelector('.Cart');
const cartToast = document.getElementById('cartToast');

addToCart.addEventListener('click', () => {
    // Show the toast message
    const toast = new bootstrap.Toast(cartToast);
    toast.show();
});
