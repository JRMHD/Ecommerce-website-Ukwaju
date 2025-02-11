<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about-us', 'about-us')->name('about');
Route::view('/cart', 'cart')->name('cart');
Route::view('/checkout', 'checkout')->name('checkout');
Route::view('/contact', 'contact')->name('contact');
Route::view('/faqs', 'faqs')->name('faqs');
Route::view('/policy', 'policy-page')->name('policy');
Route::view('/shop-detail', 'shop-detail')->name('shop.detail');
Route::view('/shop', 'shop')->name('shop');
Route::view('/wishlist', 'wishlist')->name('wishlist');

// Custom 404 Page (if needed)
Route::fallback(function () {
    return view('404');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});


Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.detail');
Route::get('/', [ShopController::class, 'home']);





Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::post('/wishlist/move-to-cart/{id}', [WishlistController::class, 'moveToCart'])->name('wishlist.moveToCart');
    Route::post('/wishlist/move-all-to-cart', [WishlistController::class, 'moveAllToCart'])->name('wishlist.moveAllToCart');

});
