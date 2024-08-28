@include('admin.forms.index')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h3 class="fw-bold mb-3">Cart</h3>
        <div class="table-responsive">
            <table id="cart-table" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Item Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Item Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($cart as $cart)
                        <tr>
                            <td>{{ $cart->id }}</td>
                            <td>{{ $cart->name }}</td>
                            <td>{{ $cart->email }}</td>
                            <td>{{ $cart->phone }}</td>
                            <td>{{ $cart->address }}</td>
                            <td>{{ $cart->item_title }}</td>
                            <td>{{ $cart->price }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>
                                @if($cart->image)
                                    <img src="{{ asset('storage/images/' . basename($cart->image)) }}" alt="Image" style="width: 50px; height: 50px;"/>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('remove_from_cart', $cart->id) }}" class="btn btn-link btn-danger" title="Remove">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
