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

Route::get('/api/access-requests', [ApiAccessController::class, 'getAccessRequests']);
Route::get('/api/seen-serial-numbers', [ApiAccessController::class, 'getSeenSerialNumbers']);
Route::get('/api/devices', [ApiAccessController::class, 'getDevices']);
Route::get('/api/devices/create', [ApiAccessController::class, 'createDeviceForm']);
Route::get('/api/devices/store', [ApiAccessController::class, 'storeDevice']);
Route::get('/api/updates', [ApiAccessController::class, 'getUpdates']);
Route::post('/api/updates', [ApiAccessController::class, 'sendUpdate']);
Route::get('/api/access-requests/serial', [ApiAccessController::class, 'getAccessRequestsBySerial']);
Route::post('/api/access-requests', [ApiAccessController::class, 'sendAccessRequest']);