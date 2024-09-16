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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Shop</title>
</head>

<body>
@include('home.navbar')
    <!-- <nav class="navbar navbar-expand-lg mt-3 ">
        <div class="container-fluid">
            <div class="logo">
                <a href="../Home2/Home2.html">
                <img src="../Home/imgs/Group 89.png" alt="logo"></a>
            </div>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../Home2/Home2.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="shop.html" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link me-0" href="#">Contact</a>
                    </li>
                    <li class="nav-item ">
                        <button class="btn search-icon rounded-circle" id="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="grey"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                        <div id="overlay" class="overlay"></div>
                        <div id="search-bar" class="search-bar">
                            <input type="text" placeholder="Search" />
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="" class="btn nav-icons rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="grey" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                              </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../order/order.html" class="btn nav-icons rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="grey" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                              </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                       <a href="../profile/profile.html">
                           <img src="imgs/profileimg.png" alt="">
                        </a>
                    </li>
                   
                </ul>



            </div>
        </div>
      
    </nav> -->




      <section class="featured-products py-5 mb-3 mt-4 ">
        <div class="container">
            <h2 class="text-center mb-5">Shop <strong>Products</strong> </h2>
            <div class="row">
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
                                <form action="{{ route('add_cart', ['id' => $item->id]) }}" method="POST" style="display: inline;">
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
    <script src="shop.js"></script>
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

</script>