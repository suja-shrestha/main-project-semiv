<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productv2Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by RouteServiceProvider and assigned the "api"
| middleware group. Typically for API calls only.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ Better: Use a controller for products
Route::get('/products', [Productv2Controller::class, 'index']);
