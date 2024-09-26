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
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Profile Info</title>
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
                    <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('imgs/bigProfile.png') }}" 
                        alt="Profile Picture" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
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
                <form method="POST" action="{{ route('updateInfo') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="mb-3 upload-Picture">
    <img id="profilePreview" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'imgs/user@2x.png' }}" alt="Profile Picture" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
    <label for="uploadLogo" class="mt-3 ">
        <div class="upload-logo">
            <span class="ms-2">Upload Picture</span>
            <input type="file" class="form-control1 d-none" id="uploadLogo" name="profile_picture" accept="image/*" onchange="previewProfilePicture(event)">
        </div>
    </label>
</div>

    
    <div class="inputs">
        <div class="mb-2">
            <label for="fullName" class="form-label fw-bold">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="name" value="{{ old('name', $user->name) }}" placeholder="Full Name">
        </div>
        
        <div class="mb-2">
            <label for="emailAddress" class="form-label fw-bold">Email Address</label>
            <input type="email" class="form-control" id="emailAddress" name="email" value="{{ old('email', $user->email) }}" placeholder="Email Address">
        </div>
        
        <div class="mb-4">
            <label for="mobileNumber" class="form-label fw-bold">Mobile Number</label>
            <input type="text" class="form-control" id="mobileNumber" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="0790000000">
        </div>
        
        <div class="d-grid gap-2">
            <button type="submit" class="btn submit mb-1">Update</button>
            <button class="btn logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img src="imgs/Group 4686.svg" alt="" class="me-2">Logout
            </button>

        </div>
    </div>
</form>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

                </div>
            </div>

            <!-- Change Password -->
            <div class="col-md-3">
                <div class="card password-card p-4">
                    <h5 class="fw-bold">Change Password</h5>
                    <p class="mt-3">Need to update your password?</p>
                    <a href="#" class="btn btn-outline-teal fw-bold">Update Password</a>
                </div>
            </div>
        </div>
    </div>
    
    
    
    

      
    @include('home.footer')

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Profile Updated',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <script>
    function previewProfilePicture(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('profilePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="profile.js"></script>
 
</body>

</html>