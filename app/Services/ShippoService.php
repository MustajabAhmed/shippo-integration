<?php

namespace App\Services;

use GuzzleHttp\Client;

class ShippoService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.goshippo.com/',
            'headers' => [
                'Authorization' => 'ShippoToken ' . env('SHIPPO_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function createShipment($addressFrom, $addressTo, $parcel)
    {
        try {
            $data = [
                'address_from' => $addressFrom,
                'address_to' => $addressTo,
                'parcels' => [$parcel],
                'async' => false,
            ];

            $response = $this->client->post('shipments/', [
                'json' => $data,
            ]);

            $shipment = json_decode($response->getBody()->getContents(), true);

            return $shipment;

        } catch (\Exception $e) {
            return ['error' => 'Error creating shipment: ' . $e->getMessage()];
        }
    }

    public function getShipment($shipmentId)
    {
        try {
            $response = $this->client->get('shipments/' . $shipmentId);

            return json_decode($response->getBody()->getContents(), true);

        } catch (\Exception $e) {
            return ['error' => 'Error fetching shipment: ' . $e->getMessage()];
        }
    }

    public function listShipments($params = [])
    {
        try {
            $response = $this->client->get('shipments/', [
                'query' => $params
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (\Exception $e) {
            return ['error' => 'Error listing shipments: ' . $e->getMessage()];
        }
    }

    public function createOrder($orderDetails)
    {
        try {
            $response = $this->client->post('orders/', [
                'json' => $orderDetails,
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (\Exception $e) {
            return ['error' => 'Error creating order: ' . $e->getMessage()];
        }
    }

    public function getOrders()
    {
        try {
            $response = $this->client->get('orders/');

            return json_decode($response->getBody()->getContents(), true);

        } catch (\Exception $e) {
            return ['error' => 'Error fetching orders: ' . $e->getMessage()];
        }
    }
}
