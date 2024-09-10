<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create Order</h1>

        <!-- Display Success or Error Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('order.create') }}" method="POST">
            @csrf

            <!-- Shipping Address Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5">Shipping Address</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="to_name" class="form-label">Name:</label>
                        <input type="text" id="to_name" name="to_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_company" class="form-label">Company:</label>
                        <input type="text" id="to_company" name="to_company" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="to_street1" class="form-label">Street 1:</label>
                        <input type="text" id="to_street1" name="to_street1" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_street2" class="form-label">Street 2:</label>
                        <input type="text" id="to_street2" name="to_street2" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="to_city" class="form-label">City:</label>
                        <input type="text" id="to_city" name="to_city" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_state" class="form-label">State:</label>
                        <input type="text" id="to_state" name="to_state" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_zip" class="form-label">ZIP Code:</label>
                        <input type="text" id="to_zip" name="to_zip" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_country" class="form-label">Country:</label>
                        <input type="text" id="to_country" name="to_country" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_phone" class="form-label">Phone:</label>
                        <input type="text" id="to_phone" name="to_phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_email" class="form-label">Email:</label>
                        <input type="email" id="to_email" name="to_email" class="form-control" required>
                    </div>
                </div>
            </div>

            <!-- Order Details Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5">Order Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="order_number" class="form-label">Order Number:</label>
                        <input type="text" id="order_number" name="order_number" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="order_status" class="form-label">Order Status:</label>
                        <select id="order_status" name="order_status" class="form-select" required>
                            <option value="PAID">Paid</option>
                            <option value="UNPAID">Unpaid</option>
                            <option value="CANCELLED">Cancelled</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="shipping_cost" class="form-label">Shipping Cost:</label>
                        <input type="number" id="shipping_cost" name="shipping_cost" class="form-control"
                            step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="shipping_method" class="form-label">Shipping Method:</label>
                        <input type="text" id="shipping_method" name="shipping_method" class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="subtotal_price" class="form-label">Subtotal Price:</label>
                        <input type="number" id="subtotal_price" name="subtotal_price" class="form-control"
                            step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price:</label>
                        <input type="number" id="total_price" name="total_price" class="form-control"
                            step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_tax" class="form-label">Total Tax:</label>
                        <input type="number" id="total_tax" name="total_tax" class="form-control" step="0.01">
                    </div>

                    <div class="mb-3">
                        <label for="currency" class="form-label">Currency:</label>
                        <input type="text" id="currency" name="currency" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="placed_at" class="form-label">Placed At:</label>
                        <input type="datetime-local" id="placed_at" name="placed_at" class="form-control" required>
                    </div>
                </div>
            </div>

            <!-- Item Details Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5">Item Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="item_currency" class="form-label">Currency:</label>
                        <input type="text" id="item_currency" name="item_currency" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_product" class="form-label">Product:</label>
                        <input type="text" id="item_product" name="item_product" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_quantity" class="form-label">Quantity:</label>
                        <input type="number" id="item_quantity" name="item_quantity" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_sku" class="form-label">SKU:</label>
                        <input type="text" id="item_sku" name="item_sku" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_title" class="form-label">Title:</label>
                        <input type="text" id="item_title" name="item_title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_total_amount" class="form-label">Total Amount:</label>
                        <input type="number" id="item_total_amount" name="item_total_amount" class="form-control"
                            step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_total_weight" class="form-label">Total Weight:</label>
                        <input type="number" id="item_total_weight" name="item_total_weight" class="form-control"
                            step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_weight_unit" class="form-label">Weight Unit:</label>
                        <input type="text" id="item_weight_unit" name="item_weight_unit" class="form-control"
                            required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
