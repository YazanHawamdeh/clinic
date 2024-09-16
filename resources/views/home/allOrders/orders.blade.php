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
    <link rel="stylesheet" href="assets/css/orders.css">

    <title>Orders</title>
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
                            <a class="card-link " href="{{ route('profileInfo')}}"> <img src="imgs/Group 3234.svg" alt=""><span>Info</span></a>
                        </li>
                        <li class="card-item">
                            <a class="card-link " href="{{ route('favorites')}}"><img src="imgs/bookmark.svg" alt=""><span>Favorite</span></a>
                        </li>
                        <li class="card-item">
                            <a class="card-link active" href="{{ route('allOrders') }}"><img src="imgs/Layer2.svg" alt=""><span>Orders</span> </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="orders-container">
                    <div class="orders-header">
                        <div class="header-item">NO.</div>
                        <div class="header-item">Month</div>
                        <div class="header-item">Year</div>
                        <div class="header-item">Salary</div>
                        <div class="header-item">Entry Date</div>
                        <div class="header-item">Action</div>
                    </div>
                    <div class="orders-list">
                        @foreach ($orders as $order)
                            <div class="order-item">
                                <div class="order-no">{{ $order->id }}</div>
                                <div class="order-month">{{ $order->created_at->format('F') }}</div>
                                <div class="order-year">    {{ $order->created_at->format('Y') }}</div>
                                <div class="order-salary">{{ number_format($order->total_price , 2) }} SAR</div>
                                <div class="order-entry-date">{{ $order->entry_date ? $order->entry_date->format('d/m/Y') : 'N/A' }}</div>
                                <div class="order-action">
                                    <button class="edit-btn">✏️</button>
                                    <button class="delete-btn" ><a href="{{ route('delete_order', $order->id) }}">❌</a></button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="pagination py-2 px-3 justify-content-between">
    <div class="page-controls d-flex">
        <span class="ms-3 me-3">Page {{ $orders->currentPage() }} of {{ $orders->lastPage() }}</span>

        <!-- Previous Button -->
        <button class="prev-btn me-2" {{ $orders->onFirstPage() ? 'disabled' : '' }}>
            <a href="{{ $orders->previousPageUrl() }}">
                <img src="{{ asset('assets/imgshome/up-arrow.svg') }}" alt="Previous">
            </a>
        </button>

        <!-- Dynamically generated page numbers -->
        <div class="page-numbers d-flex">
            @for ($page = 1; $page <= $orders->lastPage(); $page++)
                <a href="{{ $orders->url($page) }}" class="page-number {{ $page == $orders->currentPage() ? 'active' : '' }}">
                    {{ $page }}
                </a>
            @endfor
        </div>

        <!-- Next Button -->
        <button class="next-btn ms-2" {{ !$orders->hasMorePages() ? 'disabled' : '' }}>
            <a href="{{ $orders->nextPageUrl() }}">
                <img src="{{ asset('assets/imgshome/up-arrow (1).svg') }}" alt="Next">
            </a>
        </button>
    </div>

    <!-- Results per page -->
    <div class="results d-flex align-items-center">
        <span>Show</span>
        <input type="number" value="{{ $orders->perPage() }}" class="results-number py-1 ps-2 ms-3 me-3">
        <span>Results</span>
    </div>
</div>

            </div>
        </div>
    </div>

    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../login/login.js"></script>
    <script src="orders.js"></script>
    <script>
        function deleteOrder(id) {
            if (confirm('Are you sure you want to delete this order?')) {
                // Add AJAX request to delete order here
            }
        }
    </script>
</body>

</html>
