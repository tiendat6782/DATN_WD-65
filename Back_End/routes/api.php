<?php

use App\Http\Controllers\Api\ApiAttributeController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:api');

Route::get('/products/{productId}/variants', [ApiAttributeController::class, 'getProductVariants']);


Route::get('/product', [ApiProductController::class, 'index']);
