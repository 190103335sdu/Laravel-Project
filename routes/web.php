<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChartJsController;

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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('/', function () {
    return Redirect::to('home');
});

Auth::routes();
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/add-to-cart/{product}', [CartController::class,'add'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class,'index'])->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', [CartController::class,'destroy'])->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{rowId}', [CartController::class,'update'])->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout')->middleware('auth');
Route::resource('orders',OrderController::class)->middleware('auth');
Route::resource('shops',ShopController::class)->middleware('auth');
Route::resource('products',ProductController::class);
Route::get('/products/search/', [ProductController::class,'search'])->name('products.search');

Route::get('/single_product/{product}', [ProductController::class,'singleProduct'])->name('product.show');


Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller.'], function () {
    Route::redirect('/','seller/orders');

    Route::resource('/orders', App\Http\Controllers\Seller\OrderController::class);

    Route::get('/orders/delivered/{suborder}', [App\Http\Controllers\Seller\OrderController::class,'markDelivered'])->name('order.delivered');
});
Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();

});
Route::get('superadmin', [ChartJsController::class, 'index'])->name('superadmin.index');
