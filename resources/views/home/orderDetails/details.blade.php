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
    <link rel="stylesheet" href="{{ asset('assets/css/details.css') }}">

    <title>Order details</title>
</head>

<body>
@include('home.navbar')

    <div class="container container-profile py-5 mt-3">
        <div class="row">
            <h2 class="mb-4 fw-bold ">Personal Profile</h2>
            <!-- Sidebar -->
            <div class="col-md-3 main">
                <div class="card main-card text-center p-3">
                    <div class="image-name">
                    <img src="imgs/bigProfile.png" alt="Profile Picture" class="rounded-circle img-fluid ">
                    <h6 class="mt-3 fw-bold">{{ Auth::user()->name }}</h6>
                </div>
                <ul class="card flex-column mt-2">
                        <li class="card-item">
                            <a class="card-link active" href="{{ route('profileInfo')}}" > <img src="imgs/Group 3234.svg" alt=""><span>Info</span></a>
                        </li>
                        <li class="card-item">
                            <a class="card-link" href="{{ route('favorites')}}"><img src="imgs/bookmark.svg" alt=""><span>Favorite</span></a>
                        </li>
                        <li class="card-item">
                            <a class="card-link" href="{{ route('allOrders')}}"><img src="imgs/Layer2.svg" alt=""><span>Orders</span> </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-6">
                <div class="card big-card p-4">
                    <div class="col-md-6 product-image mt-0">
                        <div class="header">
                            <h2>Order #{{ $order->id }}</h2>
                            <h6>{{ $order->created_at->format('d/m/Y') }}</h6>
                        </div>
                        <div class="Cards">
                            @foreach ($orderItems as $item)
                                <div class="cart-item">
                                <img src="{{ asset($item['image']) }}" alt="Product Image" class="product-img">
                                <div class="item-details">
                                        <p class="product-name">{{ $item['item_title'] }}</p>
                                        <p class="points">{{ $item['points'] ?? 0 }} Points</p>
                                        <p class="price">{{ $item['price'] }} SAR</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



            <!-- Change Password -->
            <!-- <div class="col-md-3 ">
                <div class="card product-details p-4 ">
                    <div class="header">
                    <h2 class="mb-4 fw-bold">Order Summary</h2>
                </div>
                    <p class="mt-4 mb-3">Sub Total <span class="subtotal-amount amount">41.00 SAR</span></p>
                    <p>Delivery <span class="delivery-amount amount">20.00 SAR</span></p>
                    <hr>
                    <p class="mb-3 Total">Total <span class="total-amount">61.00 SAR</span></p>
                    <p class="Total-points">Total Points Earned <span class="points-earned">300</span></p>
                   
                </div>
            </div> -->
                    <!-- Order Summary -->
        <div class="col-md-3">
            <div class="card product-details p-4">
                <div class="header">
                    <h2 class="mb-4 fw-bold">Order Summary</h2>
                </div>
                <p class="mt-4 mb-3">Sub Total <span class="subtotal-amount amount">{{ number_format($order->total_price, 2) }} SAR</span></p>
                <p>Delivery <span class="delivery-amount amount">20 SAR</span></p>
                <hr>
                <p class="mb-3 Total">Total <span class="total-amount">{{ number_format($order->total_price + 20, 2) }} SAR</span></p>
                <p class="Total-points">Total Points Earned <span class="points-earned">{{ $order->points }}</span></p>
            </div>
        </div>
        </div>
    </div>
    
    
    
    
    @include('home.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="details.css"></script>
 
</body>

</html>