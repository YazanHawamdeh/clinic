
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/order.css">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Order</title>
</head>
<body>
    @include('home.navbar')

    <div class="container product-page mt-5">
        <div class="row">
            <!-- Left Side: Product Image -->
            <div class="col-md-6 product-image mt-3">
                <h2>Shopping Cart</h2>

                @foreach($cartItems as $item)
                <div class="cart-item">
                        <img src="{{ asset($item->image) }}" alt="Product Image" class="product-img">
 

                    <div class="item-details">
                        <p class="product-name">{{ $item->item_title }}</p>
                        <p class="points">{{ $item->points }} Points</p>
                        <p class="price">{{ number_format($item->price, 2) }} SAR</p>
                    </div>
                    <div class="item-quantity">
                        <button class="quantity-btn decrement-btn" data-id="{{ $item->id }}">-</button>
                        <input type="number" value="{{ $item->quantity }}" min="1" class="quantity-input" data-id="{{ $item->id }}">
                        <button class="quantity-btn increment-btn" data-id="{{ $item->id }}">+</button>
                    </div>

                    <form action="{{ route('remove_cart', ['id' => $item->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn rounded-circle">×</button>
                    </form>
                </div>
                @endforeach

            </div>

            <!-- Right Side: Order Summary -->
            <div class="col-md-6 product-details mt-3">
                <h2>Order Summary</h2>
                <p class="mt-4 mb-3">Sub Total <span class="subtotal-amount amount">{{ number_format($cartItems->sum('price'), 2) }} SAR</span></p>
                <p>Delivery <span class="delivery-amount amount">20.00 SAR</span></p>
                <hr>
                <p class="mb-3 Total">Total <span class="total-amount">{{ number_format($cartItems->sum('price') + 20, 2) }} SAR</span></p>
                <p class="Total-points">Total Points Earned <span class="points-earned">{{ $cartItems->sum('points') }}</span></p>
                <!-- <button class="submit-order">Submit Order</button> -->
                <form action="{{ route('checkout') }}" method="POST" style="display:inline;">
                        @csrf
                        @method('post')
                        <button type='submit' class="submit-order">Submit Order</button>
                        </form>
            </div>
        </div>
    </div>

    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="order.js"></script>
</body>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const incrementButtons = document.querySelectorAll('.increment-btn');
    const decrementButtons = document.querySelectorAll('.decrement-btn');
    const subtotalElement = document.querySelector('.subtotal-amount');
    const totalElement = document.querySelector('.total-amount');
    const deliveryAmount = 20;  

    function updateTotal() {
        let subtotal = 0;
        let total = 0;
        let pointsEarned = 0;

        document.querySelectorAll('.cart-item').forEach(item => {
            const quantityInput = item.querySelector('.quantity-input');
            const priceElement = item.querySelector('.price');
            const pointsElement = item.querySelector('.points');
            const price = parseFloat(priceElement.textContent.replace(' SAR', ''));
            const points = parseInt(pointsElement.textContent);
            const quantity = parseInt(quantityInput.value);

            subtotal += price * quantity;
            pointsEarned += points * quantity;
        });

        subtotalElement.textContent = subtotal.toFixed(2) + ' SAR';
        totalElement.textContent = (subtotal + deliveryAmount).toFixed(2) + ' SAR';
        document.querySelector('.points-earned').textContent = pointsEarned;
    }

    function updateQuantityInBackend(itemId, newQuantity) {
    fetch("{{ route('update_cart') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id: itemId,
            quantity: newQuantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Optionally update the item's price or total
            updateTotal();
        }
    })
    .catch(error => console.error('Error:', error));
}


    incrementButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = button.getAttribute('data-id');
            const quantityInput = document.querySelector(`.quantity-input[data-id='${itemId}']`);
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = ++quantity;

            updateQuantityInBackend(itemId, quantity);
        });
    });

    decrementButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = button.getAttribute('data-id');
            const quantityInput = document.querySelector(`.quantity-input[data-id='${itemId}']`);
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = --quantity;

                updateQuantityInBackend(itemId, quantity);
            }
        });
    });

    updateTotal();
});


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





fetch("{{ route('update_cart') }}", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
        id: itemId,
        quantity: newQuantity
    })
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();  // Ensure JSON is returned
})
.then(data => {
    if (data.success) {
        updateTotal();
    } else {
        console.error('Update failed');
    }
})
.catch(error => console.error('Error:', error));



function addToCart(itemId) {
    let quantity = $('.quantity-input').val();

    $.ajax({
        url: '/add_to_cart/' + itemId,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            quantity: quantity
        },
        success: function(response) {
            // Show success toast message
            $('#cartToast').toast('show');
        }
    });
}


</script>