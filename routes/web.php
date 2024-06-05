<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ClickProdukController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('landingpage');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/promo', function () {
    return view('promo');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/admin/index', function () {
    return view('admin.index');
});

Route::get('/produk', function () {
    return view('admin.data_produk');
});

Route::get('/users', function () {
    return view('admin.data_user');
});

Route::get('/transaksi', function () {
    return view('admin.data_transaksi');
});
Route::get('/clickproduk', function () {
    return view('clickproduk');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/search', function () {
    return view('search');
});



require __DIR__.'/auth.php';

route::get('admin/index',[HomeController::class,'index']);
Route::get('/produk', [ProductController::class, 'index'])->name('admin.data_produk');

//route untuk kelola product
Route::resource('products', ProductController::class);

Route::delete('/products/{id_produk}', 'ProductController@destroy')->name('products.destroy');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Tambahkan route untuk update produk

Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');

Route::get('/clickproduk/{id_produk}', [ProductController::class, 'show'])->name('clickproduk.show');


Route::get('/promo', [PromoController::class, 'index'])->name('promo.index');


Route::get('/clickproduk/{id_produk}', [ClickProdukController::class, 'show'])->name('clickproduk.show');


Route::middleware(['auth'])->group(function () {
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
});

Route::get('/checkout/{id_produk}', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/filter-products', 'ProductController@filterProducts')->name('filter.products');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
