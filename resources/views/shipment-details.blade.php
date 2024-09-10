<!DOCTYPE html>
<html>

<head>
    <title>Shipments</title>
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

        .table th,
        .table td {
            text-align: center;
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
            <h1>All Shipments</h1>
            <a href="{{ route('shipment.create') }}" class="btn btn-primary">Add New Shipment</a>
        </div>

        @if (isset($shipments['results']) && count($shipments['results']) > 0)
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Shipment ID</th>
                        <th>Status</th>
                        <th>Tracking Number</th>
                        <th>Address From</th>
                        <th>Address To</th>
                        <th>Parcel</th>
                        {{-- <th>Created At</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shipments['results'] as $shipment)
                        <tr>
                            <td>{{ $shipment['object_id'] }}</td>
                            <td>{{ $shipment['status'] }}</td>
                            <td>{{ $shipment['tracking_number'] ?? 'N/A' }}</td>
                            <td>
                                {{ $shipment['address_from']['name'] }}<br>
                                {{ $shipment['address_from']['street1'] }}<br>
                                {{ $shipment['address_from']['city'] }}, {{ $shipment['address_from']['state'] }}
                                {{ $shipment['address_from']['zip'] }}<br>
                                {{ $shipment['address_from']['country'] }}
                            </td>
                            <td>
                                {{ $shipment['address_to']['name'] }}<br>
                                {{ $shipment['address_to']['street1'] }}<br>
                                {{ $shipment['address_to']['city'] }}, {{ $shipment['address_to']['state'] }}
                                {{ $shipment['address_to']['zip'] }}<br>
                                {{ $shipment['address_to']['country'] }}
                            </td>
                            <td>
                                Length: {{ $shipment['parcels'][0]['length'] }}
                                {{ $shipment['parcels'][0]['distance_unit'] }}<br>
                                Width: {{ $shipment['parcels'][0]['width'] }}
                                {{ $shipment['parcels'][0]['distance_unit'] }}<br>
                                Height: {{ $shipment['parcels'][0]['height'] }}
                                {{ $shipment['parcels'][0]['distance_unit'] }}<br>
                                Weight: {{ $shipment['parcels'][0]['weight'] }}
                                {{ $shipment['parcels'][0]['mass_unit'] }}
                            </td>
                            {{-- <td>{{ \Carbon\Carbon::parse($shipment['created_at'])?->format('d-m-Y H:i') }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No shipments found.</p>
        @endif
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
