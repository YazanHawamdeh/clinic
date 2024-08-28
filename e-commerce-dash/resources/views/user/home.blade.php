

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}

</head>
<body>
  @include('user.master')

  <div>
      <img class="m-auto d-flex justify-content-center align-items-center" src="{{ asset('assets/img/logo.png') }}" alt="Card image cap" width=200>

  </div>

  <nav class="navbar navbar-expand-lg custom_nav-container ">
    {{-- <a class="navbar-brand" href="index.html"><img width="250" src="{{asset('assets/img/logo.png')}}" alt="#" /></a> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
       <ul class="navbar-nav m-auto">
          <li class="nav-item active  mx-2">
             <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
         {{-- <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="about.html">About</a></li>
                <li><a href="testimonial.html">Testimonial</a></li>
             </ul>
          </li> --}}
          <li class="nav-item mx-2">
             <a class="nav-link" href="product.html">Products</a>
          </li>
          <li class="nav-item mx-2">
             <a class="nav-link" href="{{url('show_order')}}">Orders</a>
          </li>
          <li class="nav-item mx-2">
             <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item mx-2">
             <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
          </li>


          {{-- <li class="nav-item mx-2"> --}}


          {{-- </li> --}}
          

          <div class="d-flex justify-content-end align-items-end">
            <i class="icon-social-facebook m-2" style="font-size: 20px;color:black"></i>
            <i class="icon-social-instagram m-2" style="font-size: 20px"></i>
            <i class="ui-twitter-x-line m-2" style="font-size: 20px"></i>
            </div>
       </ul>

          
    </div>

 </nav>
 <x-app-layout>
</x-app-layout>
  <section class="row container d-flex justify-content-center align-items-center m-auto">
    <div class="mb-3 col-lg-6 col-md-6">
      <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="mb-3 col-lg-6 col-md-6">
      <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
      <div class="card-body">
          <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </section>


  <section class="row container d-flex justify-content-center align-items-center m-auto mt-5">
    <div class="mb-3 col-lg-4 col-md-4">
      <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="mb-3 col-lg-4 col-md-4">
      <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
      <div class="card-body">
          <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="mb-3 col-lg-4 col-md-4">
        <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
  </section>


  <section class="row container d-flex justify-content-center align-items-center m-auto mt-5">
    <div class="mb-3 col-lg-3 col-md-3">
      <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
      <div class="card-body">
        <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="mb-3 col-lg-3 col-md-3">
      <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
      <div class="card-body">
          <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
    <div class="mb-3 col-lg-3 col-md-3">
        <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
      <div class="mb-3 col-lg-3 col-md-3">
        <img class="card-img-top" src="{{ asset('assets/img/blog1.jpg') }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text mt-2"><small class="text-muted">Last updated 3 mins ago</small></p>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>

      <button type="button" class="btn btn-outline-dark m-auto w-25 my-5 btn-view">Secondary</button>

  </section>

  <footer>
    <div class=" row  m-auto container">
        <div class="col-lg-2 col-md-4 col-sm-6 text-center">
            <p class="card-text mt-2"><small class="text-muted">About</small></p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
    
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 text-center">
            <p class="card-text mt-2"><small class="text-muted">About</small></p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
    
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 text-center">
            <p class="card-text mt-2"><small class="text-muted">About</small></p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
    
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 text-center">
            <p class="card-text mt-2"><small class="text-muted">About</small></p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
    
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 text-center">
            <p class="card-text mt-2"><small class="text-muted">About</small></p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
            <p class="card-text mt-2">anything</p>
    
        </div>
    
    
    </div>
   
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
