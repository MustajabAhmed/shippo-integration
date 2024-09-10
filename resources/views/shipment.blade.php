<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Shipment</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <h1 class="mb-4">Create Shipment</h1>

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

        <form action="{{ route('shipment.create') }}" method="POST">
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5">From Address</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="from_name" class="form-label">Name:</label>
                        <input type="text" id="from_name" name="from_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="from_street1" class="form-label">Street:</label>
                        <input type="text" id="from_street1" name="from_street1" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="from_city" class="form-label">City:</label>
                        <input type="text" id="from_city" name="from_city" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="from_state" class="form-label">State:</label>
                        <input type="text" id="from_state" name="from_state" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="from_zip" class="form-label">ZIP Code:</label>
                        <input type="text" id="from_zip" name="from_zip" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="from_country" class="form-label">Country:</label>
                        <input type="text" id="from_country" name="from_country" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="from_phone" class="form-label">Phone:</label>
                        <input type="text" id="from_phone" name="from_phone" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5">To Address</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="to_name" class="form-label">Name:</label>
                        <input type="text" id="to_name" name="to_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_street1" class="form-label">Street:</label>
                        <input type="text" id="to_street1" name="to_street1" class="form-control" required>
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
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5">Parcel Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="length" class="form-label">Length (in):</label>
                        <input type="number" id="length" name="length" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="width" class="form-label">Width (in):</label>
                        <input type="number" id="width" name="width" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label">Height (in):</label>
                        <input type="number" id="height" name="height" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight (lb):</label>
                        <input type="number" id="weight" name="weight" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Shipment</button>
                </div>
            </div>
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
