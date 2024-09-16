
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
                @if(is_array($item->images) && count($item->images) > 0)
                    <img src="{{ asset('storage/' . $item->images[0]) }}" alt="Product Image" class="product-img">
                @else
                    <img src="{{ asset('path_to_default_image/default.png') }}" alt="Default Image" class="product-img">
                @endif
                    <div class="item-details">
                        <p class="product-name">{{ $item->item_title }}</p>
                        <p class="points">{{ $item->points }} Points</p>
                        <p class="price">{{ number_format($item->price, 2) }} SAR</p>
                    </div>
                    <div class="item-quantity">
                        <button class="quantity-btn decrement-btn">-</button>
                        <input type="number" value="{{ $item->quantity }}" min="1" class="quantity-input" readonly>
                        <button class="quantity-btn increment-btn">+</button>
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
