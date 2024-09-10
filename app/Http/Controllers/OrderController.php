<?php

namespace App\Http\Controllers;

use App\Services\ShippoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $shippoService;

    public function __construct(ShippoService $shippoService)
    {
        $this->shippoService = $shippoService;
    }

    public function createOrder()
    {
        try {
            $orderDetails = [
                "to_address" => [
                    "object_purpose" => "PURCHASE",
                    "city" => "San Francisco",
                    "company" => "Shippo",
                    "country" => "US",
                    "email" => "mrhippo@goshippo.com",
                    "name" => "Mr Hippo",
                    "phone" => "4151234567",
                    "state" => "CA",
                    "street1" => "965 Mission St.",
                    "street2" => "#480",
                    "zip" => "94103"
                ],
                "items" => [
                    [
                        "currency" => "USD",
                        "product" => "437f40b02951453e98969f2464165c3b",
                        "quantity" => 1,
                        "sku" => "HM-123",
                        "title" => "Hippo Magazines",
                        "placed_at" => "2025-09-23T01:28:12Z",
                        "total_amount" => "12.10",
                        "total_weight" => "0.40",
                        "weight_unit" => "lb"
                    ]
                ],
                "order_number" => "#1068",
                "order_status" => "PAID",
                "shipping_cost" => "12.83",
                "shipping_cost_currency" => "USD",
                "shipping_method" => "USPS First Class Package International Service",
                "subtotal_price" => "12.10",
                "total_price" => "24.93",
                "total_tax" => "0.00",
                "currency" => "USD",
                "placed_at" => "2016-09-23T01:28:12Z",
                "weight" => "0.40",
                "weight_unit" => "lb"
            ];

            $order = $this->shippoService->createOrder($orderDetails);

            return redirect()->route('order.show')->with('success', 'Shipment Created Successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Semething went wrong.');
        }
    }

    public function getOrder()
    {
        try {
            $orders = $this->shippoService->getOrders();

            if (isset($orders['error'])) {
                return redirect()->back()->with('error', $orders['error']);
            }

            return view('order-details', ['orders' => $orders]);

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
