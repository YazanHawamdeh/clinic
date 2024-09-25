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

    <link rel="stylesheet" href="{{ asset('assets/css/favourite.css') }}">


    <title>Favourite</title>
</head>

<body>
    @include('home.navbar')

    <div class="container container-profile py-5 mt-3">
        <div class="row">
            <h2 class="mb-4 fw-bold ">Personal Profile</h2>
            <!-- Sidebar -->
            <div class="col-md-3 main ">
                <div class="card main-card text-center p-3">
                <div class="image-name">
                    <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('imgs/bigProfile.png') }}" 
                        alt="Profile Picture" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                    <h6 class="mt-3 fw-bold">{{ Auth::user()->name }}</h6>
                </div>
                    <ul class="card flex-column mt-2">
                        <li class="card-item">
                            <a class="card-link " href="{{ route('profileInfo')}}" > <img src="imgs/Group 3234.svg" alt=""><span>Info</span></a>
                        </li>
                        <li class="card-item">
                            <a class="card-link active" href="{{ route('favorites')}}" ><img src="imgs/bookmark.svg" alt=""><span>Favorite</span></a>
                        </li>
                        <li class="card-item">
                            <a class="card-link" href="{{ route('allOrders')}}"><img src="imgs/Layer2.svg" alt=""><span>Orders</span> </a>
                        </li>
                    </ul>
                </div>
            </div>

<!-- Main Content -->
<div class="col-md-9">
    <section class="featured-products py-5 mb-3 mt-4">
        <div class="container">
        <div class="row Cards">
        @forelse ($favorites as $favorite)
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="product-card">
            <div class="product-image">
                <span class="product-points">{{ $favorite->item->points }} Points</span>
                @if($favorite->item->images->isNotEmpty())
                    <img src="{{ asset( $favorite->item->images->first()->image_url) }}" alt="{{ $favorite->item->name }}" class="img-fluid">
                @else
                    <p>No image available</p>
                @endif
                <hr>
            </div>
            <div class="product-details ms-3">
                <p class="product-name fw-bold">{{ $favorite->item->name }}</p>
                <p class="product-price mt-1">{{ $favorite->item->price }} SAR</p>
                <div class="product-actions">
                    <a href="javascript:void(0)" class="me-2" onclick="removeFromFavorite({{ $favorite->item->id }})">
                        <img src="{{ asset('assets/imgshome/removeFav.svg') }}" alt="Remove from favorite" class='addToCardBtn'>
                    </a>
                    <form action="{{ route('add_cart', ['id' => $favorite->item->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" style="border: none; background: none; padding: 0;" class="icon-card-home">
                            <img src="{{ asset('assets/imgshome/Group 1274.svg') }}" alt="Add to Cart" class='addToCardBtn'>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <p>No favorite items found.</p>
@endforelse

</div>

        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// function removeFromFavorite(itemId) {
//     $.ajax({
//         url: '/remove_from_favorite/' + itemId,
//         type: 'DELETE',
//         data: {
//             _token: '{{ csrf_token() }}'
//         },
//         success: function(response) {
//             location.reload(); // Reload the page to reflect the change
//         },
//         error: function(response) {
//             alert('Unable to remove from favorites');
//         }
//     });
// }
function removeFromFavorite(itemId) {
    $.ajax({
        url: '/remove_from_favorite/' + itemId,
        type: 'POST', // Use POST instead of DELETE
        data: {
            _token: '{{ csrf_token() }}', // CSRF token for security
            _method: 'DELETE' // Simulate the DELETE request
        },
        success: function(response) {
            location.reload(); // Reload the page to reflect the change
        },
        error: function(response) {
            alert('Unable to remove from favorites');
        }
    });
}

</script>


           
           
        </div>
    </div>
    
    
    
    

      
    @include('home.footer')




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
   
 
</body>

</html>