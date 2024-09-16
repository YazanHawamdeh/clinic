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

    <title>Product</title>
</head>

<body>
@include('home.navbar')

    <div class="container product-page mt-5">
    <div class="row w-100">
        <!-- Left Side: Product Image -->
        <div class="col-md-6 product-image mt-5">
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
        </div>
        
        <!-- Right Side: Product Details -->
        <div class="col-md-6 product-details">
            <h1 class="product-title">{{ $item->name }}</h1>
            <p class="points">{{ $item->points }} Points</p>
            <p class="description">{{ $item->description }}</p>
            <h2 class="price">{{ number_format($item->price, 2) }} SAR</h2>
            <div class="quantity-selector">
                <button class="btn decrement-btn">-</button>
                <input type="number" value="1" min="1" class="quantity-input">
                <button class="btn increment-btn">+</button>
            </div>
            <div class="actions mt-4">
                <button class="btn Favourite">Favourite</button>
                <button class="btn Cart">Add to Cart</button>
            </div>
            <div class="toast-container mt-3">
                <div id="cartToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Added to cart successfully!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
    
    

      

    @include('home.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="assets/js/product.js"></script>
 
</body>

</html>