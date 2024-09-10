<?php

namespace App\Http\Controllers;

use App\Services\ShippoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShipmentController extends Controller
{
    protected $shippoService;

    public function __construct(ShippoService $shippoService)
    {
        $this->shippoService = $shippoService;
    }

    public function createShipment()
    {
        try {
            $fromAddress = [
                'name' => 'Sender Name',
                'street1' => '123 Main St',
                'city' => 'San Francisco',
                'state' => 'CA',
                'zip' => '94117',
                'country' => 'US',
                'phone' => '555-555-5555',
            ];

            $toAddress = [
                'name' => 'Recipient Name',
                'street1' => '456 Market St',
                'city' => 'New York',
                'state' => 'NY',
                'zip' => '10002',
                'country' => 'US',
                'phone' => '555-555-5555',
            ];

            $parcel = [
                'length' => '5',
                'width' => '5',
                'height' => '5',
                'distance_unit' => 'in',
                'weight' => '2',
                'mass_unit' => 'lb',
            ];

            Log::info('Create Shipment Route hit');

            $shipment = $this->shippoService->createShipment($fromAddress, $toAddress, $parcel);

            Log::info('Shipment response: ' . json_encode($shipment));

            return redirect()->route('shipment.show')->with('success', 'Shipment Created Successfully.');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getShipments()
    {
        try {
            Log::info('Get Shipments Route hit');

            $params = []; // You can add parameters here for filtering or pagination if needed
            $shipments = $this->shippoService->listShipments($params);

            Log::info('Shipments response: ' . json_encode($shipments));

            if (isset($shipments['error'])) {
                return response()->json([
                    'error' => $shipments['error']
                ], 500);
            }

            return view('shipment-details', ['shipments' => $shipments]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
