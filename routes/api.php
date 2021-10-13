<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('search/availableHotels', [\App\Http\Controllers\HotelsSearchController::class,'search'])->name('available.hotels');
Route::get('search/providers', [\App\Http\Controllers\HotelsSearchController::class,'providers'])->name('providers.hotels');

