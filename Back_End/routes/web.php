<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.index');
});
Route::prefix('admin')->group(function () {
    // Các route bên trong nhóm này sẽ có tiền tố 'admin'
    Route::get('/product', [App\Http\Controllers\ProductsController::class, 'index']);
    // ...
});