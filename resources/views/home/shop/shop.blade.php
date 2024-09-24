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
    <link rel="stylesheet" href="assets/css/shop.css">
    <!-- <link rel="stylesheet" href="assets/css/home2.css"> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Shop</title>
</head>

<body>
@include('home.navbar')





      <section class="featured-products py-5 mb-3 mt-4 ">
        <div class="container">
            <h2 class="text-center mb-5">Shop <strong>Products</strong> </h2>
            <div class="row Cards">
            @foreach($items as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('product', ['id' => $item->id]) }}" class="d-block">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="product-points">{{ $item->points }} Points</span>
                            <img src="{{ asset($item->images->first()->image_url) }}" alt="{{ $item->name }}" class="img-fluid">
                            <hr>
                        </div>
                        <div class="product-details ms-3">
                            <p class="product-name fw-bold">{{ $item->name }}</p>
                            <p class="product-price mt-1">{{ $item->price }} SAR</p>
                            <div class="product-actions">
                                <!-- Add to Favorite -->
                                <a href="javascript:void(0)" class="me-2" onclick="addToFavorite({{ $item->id }})">
                                    <img src="{{ asset('assets/imgshome/Group 4622.svg') }}" alt="Add to Favorite" class="icon-card-home">
                                </a>
                                <!-- Add to Cart Form -->
                                <form onsubmit="event.preventDefault(); addToCart({{ $item->id }});" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" style="border: none; background: none; padding: 0;" class="icon-card-home">
                                        <img src="{{ asset('assets/imgshome/Group 1274.svg') }}" alt="Add to Cart" class="addToCardBtn">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            @endforeach
        </div>
            <div class="pagination text-center mt-4">
                <button class="prev-page btn btn-light movebtns me-2" ><</button>
                <span class="page-numbers">
                    <button class="page-number btn  active" data-page="1">01</button>
                    <button class="page-number btn " data-page="2">02</button>
                </span>
                <button class="next-page btn btn-light movebtns ms-2">></button>
            </div>
        </div>
    </section>
    

      

    @include('home.footer')




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>


</body>

</html>

<style>
  a{
    text-decoration:none !important
  }
</style>

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

</script>