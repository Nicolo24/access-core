<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAccessController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/access-requests', [ApiAccessController::class, 'getAccessRequests']);
Route::get('/seenSerialNumbers', [ApiAccessController::class, 'getSeenSerialNumbers']);
Route::get('/devices', [ApiAccessController::class, 'getDevices']);
Route::get('/devices/create', [ApiAccessController::class, 'createDeviceForm']);
Route::get('/devices/store', [ApiAccessController::class, 'storeDevice']);
Route::get('/getUpdates', [ApiAccessController::class, 'getUpdates']);
Route::post('/sendUpdate', [ApiAccessController::class, 'sendUpdate']);
Route::get('/access-requests/serial', [ApiAccessController::class, 'getAccessRequestsBySerial']);
Route::post('/sendAccessRequest', [ApiAccessController::class, 'sendAccessRequest']);