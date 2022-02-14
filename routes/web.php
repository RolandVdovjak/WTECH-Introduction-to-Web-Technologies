<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageUploadController;

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
    return view('layout.home');
})->name('home');

Route::get('/o-nas', function () {
    return view('layout.aboutus');
});

Route::get('/admin', function () {
    return view('layout.admin');
 })->middleware(['auth','isAdmin']);;

/*
Route::get('/nakupny-kosik', function () {
    return view('layout.cart');
});
*/

Route::get('/detail-produktu', function () {
    return view('layout.productdetail');
});

/**
Route::get('/produkt', function () {
return view('layout.products');
});
 * */

Route::post('/produkt/', [ProductController::class, 'store'])->middleware(['auth','isAdmin']);
Route::delete('/produkt/{product}', [ProductController::class, 'destroy'])->middleware(['auth','isAdmin']);
Route::get('/produkt/{product}/edit', [ProductController::class, 'edit'])->middleware(['auth','isAdmin']);


Route::get('/produkt/', [ProductController::class, 'index'])->middleware(\App\Http\Middleware\StripEmptyParams::class);
Route::get('/produkt/Nausnice', [ProductController::class, 'index'])->middleware(\App\Http\Middleware\StripEmptyParams::class);
Route::get('/produkt/Privesky', [ProductController::class, 'index'])->middleware(\App\Http\Middleware\StripEmptyParams::class);
Route::get('/produkt/Gombiky', [ProductController::class, 'index'])->middleware(\App\Http\Middleware\StripEmptyParams::class);
Route::get('/produkt/Vyvrtky', [ProductController::class, 'index'])->middleware(\App\Http\Middleware\StripEmptyParams::class);
Route::get('/produkt/Noze', [ProductController::class, 'index'])->middleware(\App\Http\Middleware\StripEmptyParams::class);

//Route::get('/produkt/{product}', [ProductController::class, 'update'])->middleware(['auth','isAdmin']);
Route::post('/produkt/{product}', [ProductController::class, 'update'])->middleware(['auth','isAdmin', 'makePostPatch']);


//Route::resource('/produkt', ProductController::class);

Route::get('/produkt/Nausnice/{product}/', [ProductController::class, 'show']);
Route::get('/produkt/Privesky/{product}/', [ProductController::class, 'show']);
Route::get('/produkt/Gombiky/{product}/', [ProductController::class, 'show']);
Route::get('/produkt/Noze/{product}/', [ProductController::class, 'show']);
Route::get('/produkt/Vyvrtky/{product}/', [ProductController::class, 'show']);

//https://therealprogrammer.com/how-to-make-laravel-8-shopping-cart/
//Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::post('order', [OrderController::class, 'store'])->name('order.store');

Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');


Route::resource('/address', AddressController::class)
    ->middleware('auth');;



require __DIR__.'/auth.php';
