@include('admin.forms.index')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* .page-inner {
            padding: 20px;
        }
        .page-header {
            margin-bottom: 20px;
        }
        .breadcrumbs {
            margin-bottom: 10px;
            list-style: none;
            padding: 0;
        }
        .breadcrumbs li {
            display: inline;
            font-size: 14px;
        }
        .breadcrumbs li a {
            color: #007bff;
        }
        .breadcrumbs li.separator {
            margin: 0 5px;
        } */

    </style>
</head>
<body>
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Orders</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Orders</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">All Orders</a>
                </li>
            </ul>
        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <table id="orders-table" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Total Price</th>
                        <th>Items</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Total Price</th>
                        <th>Items</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
    @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>${{ $order->total_price }}</td>
            <td>
                <ul>
                    @foreach (json_decode($order->items) as $item)
                        <li>{{ $item->item_title }} <!-- - {{ $item->quantity }} x ${{ $item->price }} --></li>
                        
                        <!-- Assuming $item->id corresponds to the Item model -->
                        @php
                            $itemModel = \App\Models\Item::find($item->id);
                        @endphp
                        
                        @if($itemModel)
                            <div class="item-images">
                                @foreach($itemModel->images as $image) <!-- Assuming $itemModel->images is the relation -->
                                    <img src="{{ asset($image->image_url) }}" alt="{{ $item->item_title }}" width="50" height="50">
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </ul>
            </td>
            <td>{{ $order->created_at }}</td>
            <td>
            <a href="javascript:void(0)" class="btn btn-link btn-primary" title="View" onclick="viewOrder({{ $order->id }})">
                    <i class="fa fa-eye"></i>
                </a>

                <a href="javascript:void(0)" class="btn btn-link btn-danger" title="Delete" onclick="confirmDelete({{ $order->id }})">
                    <i class="fa fa-trash"></i>
                </a>

            </td>
        </tr>
    @endforeach
</tbody>

            </table>
        </div>
    </div>



    <!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body-content">
                <!-- Order details will be loaded here via AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#orders-table').DataTable({
                pageLength: 5
            });
        });

        function confirmDelete(orderId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, redirect to delete the order
                    window.location.href = '/delete_order/' + orderId;
                }
            })
        }



        function viewOrder(orderId) {
    $.ajax({
        url: '/get_order_details/' + orderId, // Adjust to your route for fetching order details
        method: 'GET',
        success: function(response) {
            $('#modal-body-content').html(response); // Load the response into the modal body
            $('#orderModal').modal('show'); // Show the modal
        },
        error: function() {
            Swal.fire('Error', 'Unable to load order details. Please try again later.', 'error');
        }
    });
}

    </script>
</body>
</html>
