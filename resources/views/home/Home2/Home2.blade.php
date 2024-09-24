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
    <!-- <link rel="stylesheet" href="Home2.css"> -->
    <link rel="stylesheet" href="assets/css/home2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home2</title>
</head>

<body>
@include('home.navbar')


    <section class="rectangle-container mt-5 pt-5 ">
        <div class="container-fluid">
            <div class="row">
            <div class="text-container ">
                <h1>{{$banner->title}}</h1>
                <p>{{$banner->description}}</p>
                <a class="btn learn-more-btn" href="">Learn More</a>
            </div>

            <div class="images-container  text-center">
            <img src="{{ asset('storage/' . $banner->image_url_1) }}" alt="" class="img-fluid mb-3">
            <img src="{{ asset('storage/' . $banner->image_url_2) }}" alt="" class="img-fluid mb-3">


                <!-- <img src="imgs/img1.png" alt="Smiling woman" class="img-fluid mb-3"> -->

            </div>
          

            <div class="about-container mt-5 mb-2" id='about'>
             
                <h2>{{$aboutUs->title}}</h2>
                <p>{{$aboutUs->description}}</p>
                <ul class="text-start mx-auto d-inline-block">
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#3C757D" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                      </svg>{{$aboutUs->titleBox1}}</li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#3C757D" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                      </svg>{{$aboutUs->titleBox1}}</li>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#3C757D" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                      </svg>{{$aboutUs->title_box_2}}</li>
                </ul>
           
            </div>
            <div class="bottom-img ">
            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="" class="img-fluid mb-3" width='100' height='100'>
            </div>


            
            </div>
        </div>
    </section>


    <section class="features-section py-4">
    <div class="row text-center justify-content-center">
            <div class="col-md-4 feature-box">
              <!-- <img src="imgs/book.svg" alt="Efficient Ordering Process" class="feature-icon mb-3"> -->
              <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Efficient Ordering Process" class="feature-icon mb-3">
              <h4 class="feature-title">{{$aboutUs->title_box_1}}</h4>
              <p class="feature-description">
              {{$aboutUs->description_box_1}}              </p>
            </div>
            <div class="col-md-4 feature-box">
            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Efficient Ordering Process" class="feature-icon mb-3">
            <h4 class="feature-title">{{$aboutUs->title_box_2}}</h4>
              <p class="feature-description">
              {{$aboutUs->description_box_2}}              </p>
              </p>
            </div>
            <div class="col-md-4 feature-box">
            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Efficient Ordering Process" class="feature-icon mb-3">
            <h4 class="feature-title">{{$aboutUs->title_box_3}}</h4>
              <p class="feature-description">
              {{$aboutUs->description_box_3}}              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="featured-products py-5 mb-3">
    <div class="container">
        <h2 class="text-center mb-5">Featured <strong>Products</strong></h2>
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
        <div class="text-center mt-3">
            <a href="{{ route('shop') }}" class="btn viewAll">View All</a>
        </div>
    </div>
</section>

    
<section class="related-links-section pt-5 mb-5">
    <div class="container">
        <h2 class="text-center">Related <strong>Links</strong></h2>
        <div id="relatedLinksCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($relatedLink as $index => $link)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="carousel-image-container">
                            <img src="{{ asset('assets/imgshome/jaw2.png') }}" alt="Related Image" class="img-fluid carousel-image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="related-title">{{ $link->title }}</h3>
                            <p class="related-description">{{ $link->description }}</p>
                            <a href="{{ $link->link }}" class="btn">Open Link</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Custom Buttons for Carousel -->
            <div class="carousel-controls ">
                <button id="prevBtn" class="carousel-btn"><</button>
                <button id="nextBtn" class="carousel-btn">></button>
            </div>
        </div>
    </div>
</section>

<script>
    // JavaScript to handle carousel navigation
    const carousel = document.querySelector('#relatedLinksCarousel');
    const prevBtn = document.querySelector('#prevBtn');
    const nextBtn = document.querySelector('#nextBtn');

    prevBtn.addEventListener('click', function () {
        const carouselInstance = new bootstrap.Carousel(carousel);
        carouselInstance.prev();
    });

    nextBtn.addEventListener('click', function () {
        const carouselInstance = new bootstrap.Carousel(carousel);
        carouselInstance.next();
    });
</script>





      <section class="overlay-section" id='contact'>
        <img src="{{ asset('assets/imgshome/Union 31.png') }}" alt="Background Image" class="background-image">
        
        <!-- Content to be overlaid -->
        <div class="overlay-content">
          <div class="image-container  ">
            <img src="{{ asset('assets/imgshome/jaw2.png') }}" alt="Jaw Image" class="jaw-image">
          </div>
          <div class="text-content ">
            <h6>STAY IN TOUCH WITH</h6>
            <h2>The Only <strong>Right Place</strong></h2>
            <a href="#" class="btn btn-outline-light">Contact Us</a>
          </div>
        </div>
      </section>
      
      @include('home.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="{{ asset('assets/js/Home2.js') }}"></script>

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
