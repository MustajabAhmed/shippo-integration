<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-shipment', function () {
    return view('shipment');
})->name('shipment.form');

Route::post('/create-shipment', [ShipmentController::class, 'createShipment'])->name('shipment.create');
Route::get('/get-shipment', [ShipmentController::class, 'getShipments'])->name('shipment.show');

Route::get('/create-order', function () {
    return view('order');
})->name('order.form');

Route::post('/create-order', [OrderController::class, 'createOrder'])->name('order.create');
Route::get('/get-order', [OrderController::class, 'getOrder'])->name('order.show');