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
        <!-- Left Side: Product Image -->
        <!-- <div class="col-md-6 product-image mt-5">
            <img src="{{ asset($item->images->first()->image_url ?? 'default-image.png') }}" alt="Product Image" class="img-fluid">
            <div class="carousel">
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>  
                      @foreach($item->images as $image)
                    <img src="{{ asset($image->image_url) }}" alt="Product Thumbnail" class="img-thumbnail">
                @endforeach
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> 
               </div>
        </div> -->
        <div class="col-md-6 product-image mt-5 ">
                <img src="imgs/dentalstaff2.png" alt="Product Image" class="img-fluid main-image-slider">
                <div class="carousel">
                    <button class="carousel-control-prev"><</button>
                    @foreach($item->images as $image)
                        <img src="{{ asset($image->image_url) }}" alt="Product Thumbnail" class="img-thumbnail sliderProductDetails">
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
            <form onsubmit="event.preventDefault(); addToCart({{ $item->id }});" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="btn Cart">Add to Cart</button>
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


// document.addEventListener('DOMContentLoaded', function() {
//     const incrementButtons = document.querySelectorAll('.increment-btn');
//     const decrementButtons = document.querySelectorAll('.decrement-btn');
//     const subtotalElement = document.querySelector('.subtotal-amount');
//     const totalElement = document.querySelector('.total-amount');
//     const deliveryAmount = 20;  

//     function updateTotal() {
//         let subtotal = 0;
//         let total = 0;
//         let pointsEarned = 0;

//         document.querySelectorAll('.cart-item').forEach(item => {
//             const quantityInput = item.querySelector('.quantity-input');
//             const priceElement = item.querySelector('.price');
//             const pointsElement = item.querySelector('.points');
//             const price = parseFloat(priceElement.textContent.replace(' SAR', ''));
//             const points = parseInt(pointsElement.textContent);
//             const quantity = parseInt(quantityInput.value);

//             subtotal += price * quantity;
//             pointsEarned += points * quantity;
//         });

//         subtotalElement.textContent = subtotal.toFixed(2) + ' SAR';
//         totalElement.textContent = (subtotal + deliveryAmount).toFixed(2) + ' SAR';
//         document.querySelector('.points-earned').textContent = pointsEarned;
//     }

//     function updateQuantityInBackend(itemId, newQuantity) {
//     fetch("{{ route('update_cart') }}", {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': '{{ csrf_token() }}'
//         },
//         body: JSON.stringify({
//             id: itemId,
//             quantity: newQuantity
//         })
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.success) {
//             // Optionally update the item's price or total
//             updateTotal();
//         }
//     })
//     .catch(error => console.error('Error:', error));
// }


//     incrementButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const itemId = button.getAttribute('data-id');
//             const quantityInput = document.querySelector(`.quantity-input[data-id='${itemId}']`);
//             let quantity = parseInt(quantityInput.value);
//             quantityInput.value = ++quantity;

//             updateQuantityInBackend(itemId, quantity);
//         });
//     });

//     decrementButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const itemId = button.getAttribute('data-id');
//             const quantityInput = document.querySelector(`.quantity-input[data-id='${itemId}']`);
//             let quantity = parseInt(quantityInput.value);
//             if (quantity > 1) {
//                 quantityInput.value = --quantity;

//                 updateQuantityInBackend(itemId, quantity);
//             }
//         });
//     });

//     updateTotal();
// });


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
    $.ajax({
        url: '{{ route('add_cart', ['id' => ':id']) }}'.replace(':id', itemId),
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            quantity: 1
        },
        success: function(response) {
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

</script>


<script src="{{ asset('assets/js/product.js') }}"></script>





