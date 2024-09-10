<!DOCTYPE html>
<html>

<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        .alert {
            margin-bottom: 20px;
        }

        table {
            margin-top: 20px;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Order Details</h1>
            <a href="{{ route('order.create') }}" class="btn btn-primary">Add New Order</a>
        </div>

        @if (isset($orders['results']) && count($orders['results']) > 0)
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Order Number</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Shipping Cost</th>
                        <th>Placed At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders['results'] as $order)
                        <tr>
                            <td>{{ $order['order_number'] }}</td>
                            <td>{{ $order['order_status'] }}</td>
                            <td>${{ number_format($order['total_price'], 2) }}</td>
                            <td>${{ number_format($order['shipping_cost'], 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($order['placed_at'])->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No orders found.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
