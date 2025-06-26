<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomPriceController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
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

//Product
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

//Partners
Route::get('/partners', [PartnerController::class, 'index']);
Route::post('/partners', [PartnerController::class, 'store']);
Route::put('/partners/{id}', [PartnerController::class, 'update']);
Route::delete('/partners/{id}', [PartnerController::class, 'destroy']);

//Custom Price

Route::get('/custom-prices', [CustomPriceController::class, 'index']);
Route::post('/custom-prices', [CustomPriceController::class, 'store']);
