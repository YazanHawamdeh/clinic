<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/product.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Product</title>
</head>

<body>
@include('home.navbar')

    <div class="container product-page mt-5">
    <div class="row w-100">

        <div class="col-md-6 product-image mt-5 ">
                <img src="imgs/dentalstaff2.png" alt="Product Image" class="img-fluid main-image-slider">
                <div class="carousel">
                    <button class="carousel-control-prev"><</button>
                    @foreach($item->images as $image)
                        <img src="{{ asset($image->image_url) }}" alt="Product Thumbnail" class="img-thumbnail active-thumbnail sliderProductDetails">
                    @endforeach

                    <button class="carousel-control-next">></button>
                </div>
            </div>
            
        
        <!-- Right Side: Product Details -->
        <div class="col-md-6 product-details">
            <h1 class="product-title">{{ $item->name }}</h1>
            <p class="points">{{ $item->points }} Points</p>
            <p class="description">{{ $item->description }}</p>
            <h2 class="price">{{ number_format($item->price, 2) }} SAR</h2>
            <div class="quantity-selector">
                <button class="quantity-btn decrement-btn">-</button>
                <input type="number" value="{{ $item->quantity?$item->quantity:1 }}" min="1" data-id="{{ $item->id }}" class="quantity-input">
                <button class="quantity-btn increment-btn">+</button>
            </div>
            <div class="actions mt-4">
            <a href="javascript:void(0)" class="me-2" onclick="addToFavorite({{ $item->id }})">
            <button class="btn Favourite">Favourite</button>
            </a>
 
            <form onsubmit="event.preventDefault(); updateCartCount();addToCart({{ $item->id }});" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" class="badge" name="quantity" value="{{ $item->quantity ? $item->quantity : 1 }}">
                <button class="btn Cart add-to-cart-btn">Add to Cart</button>
            </form>

            </div>
            <!-- <div class="toast-container mt-3">
                <div id="cartToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Added to cart successfully!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

    
    
    

      

    @include('home.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="assets/js/product.js"></script>
 
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>



function addToFavorite(itemId) {
    $.ajax({
        url: '{{ route('add_to_favorite', ['id' => ':id']) }}'.replace(':id', itemId),
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            Swal.fire({
                title: 'Success!',
                text: response.message || 'Item added to favorites',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(response) {
            Swal.fire({
                title: 'Error!',
                text: response.responseJSON?.message || 'Unable to add item to favorites',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}


function addToCart(itemId) {
    let quantity = document.querySelector('.quantity-input').value;  // Get the quantity value

    $.ajax({
        url: '{{ route('add_cart', ['id' => ':id']) }}'.replace(':id', itemId),
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            quantity: quantity  // Pass the quantity to the backend
        },
        success: function(response) {
            updateCartCount();
            Swal.fire({
                title: 'Success!',
                text: response.message || 'Item added to cart',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(response) {
            Swal.fire({
                title: 'Error!',
                text: response.responseJSON?.message || 'Unable to add item to cart',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}





$('.quantity-input').on('change', function() {
    let cartItemId = $(this).data('id'); // Get the item's ID
    let quantity = $(this).val(); // Get the new quantity

    $.ajax({
        url: `/update_quantity/${cartItemId}`,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            quantity: quantity
        },
        success: function(response) {
            if (response.success) {
                $(`#item-total-${cartItemId}`).text(response.newPrice.toFixed(2)); // Update total
                updateTotal();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});








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


// const addToCart = document.querySelector('.Cart');
// const cartToast = document.getElementById('cartToast');

// addToCart.addEventListener('click', () => {
//     const toast = new bootstrap.Toast(cartToast);
//     toast.show();
// });
// Function to update cart count without reloading the page

</script>


<script src="{{ asset('assets/js/product.js') }}"></script>






<script>
    function updateCartCount() {
    $.ajax({
        url: '{{ route("cart.count") }}', // A new route to fetch cart count
        type: 'GET',
        success: function (data) {
            // Update the cart count badge
            $('.badge').text(data.cartCount);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}


$('.add-to-cart-btn').click(function() {
    // Your logic to add the item to the cart
    updateCartCount();  // Call the function to update the count
});

$('.remove-from-cart-btn').click(function() {
    // Your logic to remove the item from the cart
    updateCartCount();  // Call the function to update the count
});

</script>