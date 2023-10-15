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
    Route::get('/product', [App\Http\Controllers\ProductsController::class, 'index'])->name('route_index_product');
    Route::match(['GET','POST'], '/product/add', [App\Http\Controllers\ProductsController::class, 'addProduct'])->name('route_add_product');
    Route::match(['GET','POST'], '/product/delete/{id}', [App\Http\Controllers\ProductsController::class, 'deleteProduct'])->name('route_delete_product');
    Route::match(['GET','POST'], '/product/edit/{id}', [App\Http\Controllers\ProductsController::class, 'editProduct'])->name('route_edit_product');
    // ...
});
Route::prefix('admin')->group(function () {
    // Các route bên trong nhóm này sẽ có tiền tố 'admin'
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('route_index_category');
    Route::match(['GET','POST'], '/category/add', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('route_add_category');
    Route::match(['GET','POST'], '/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('route_delete_category');
    Route::match(['GET','POST'], '/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('route_edit_category');
   
});