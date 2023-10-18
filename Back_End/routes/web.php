<?php

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
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
    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('admin.products.index');
        Route::get('create', 'create')->name('admin.products.create');
        Route::post('store', 'store')->name('admin.products.store');
        Route::get('/edit/{id}', 'edit')->name('admin.products.edit');
        Route::post('/update/{id}', 'update')->name('admin.products.update');
        Route::get('/destroy/{id}', 'destroy')->name('admin.products.destroy');
    });
    //USER
    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('admin.users.index');
        Route::get('create', 'create')->name('admin.users.create');
        Route::post('store', 'store')->name('admin.users.store');
        Route::get('/edit/{id}', 'edit')->name('admin.users.edit');
        Route::post('/update/{id}', 'update')->name('admin.users.update');
        Route::get('/destroy/{id}', 'destroy')->name('admin.users.destroy');
    });
    //COLOR
    Route::prefix('colors')->controller(ColorController::class)->group(function () {
        Route::get('/', 'index')->name('admin.colors.index');
        Route::get('create', 'create')->name('admin.colors.create');
        Route::post('store', 'store')->name('admin.colors.store');
        Route::get('/edit/{id}', 'edit')->name('admin.colors.edit');
        Route::post('/update/{id}', 'update')->name('admin.colors.update');
        Route::get('/destroy/{id}', 'destroy')->name('admin.colors.destroy');
    });
    //SIZE
    Route::prefix('sizes')->controller(SizeController::class)->group(function () {
        Route::get('/', 'index')->name('admin.sizes.index');
        Route::get('create', 'create')->name('admin.sizes.create');
        Route::post('store', 'store')->name('admin.sizes.store');
        Route::get('/edit/{id}', 'edit')->name('admin.sizes.edit');
        Route::post('/update/{id}', 'update')->name('admin.sizes.update');
        Route::get('/destroy/{id}', 'destroy')->name('admin.sizes.destroy');
    });
});

