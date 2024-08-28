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
                                        <li>{{ $item->item_title }} - {{ $item->quantity }} x ${{ $item->price }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <a href="{{ url('view_order', $order->id) }}" class="btn btn-link btn-primary" title="View">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ url('delete_order', $order->id) }}" class="btn btn-link btn-danger" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    </script>
</body>
</html>
