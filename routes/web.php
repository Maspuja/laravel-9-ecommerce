<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', [ProductController::class, 'index_product'])->name('index_product');
Route::get('/home', [ProductController::class, 'index_product'])->name('index_product');

Auth::routes();
Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');
Route::get('/blog', [BlogController::class, 'index_blog'])->name('index_blog');
Route::get('/blog/create', [BlogController::class, 'create_blog'])->name('create_blog');
Route::post('/blog/create', [BlogController::class, 'store_blog'])->name('store_blog');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show_blog'])->name('show_blog');


Route::middleware(['admin'])->group(function()
{
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');
    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_Payment'])->name('confirm_payment');
    Route::get('/category', [CategoryController::class, 'index_category'])->name('index_category');
    Route::get('/category/create', [CategoryController::class, 'create_category'])->name('create_category');
    Route::post('/category/create', [CategoryController::class, 'store_category'])->name('store_category');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit_category'])->name('edit_category');
    Route::patch('/category/{category}/update', [CategoryController::class, 'update_category'])->name('update_category');
    Route::delete('/category/{category}', [CategoryController::class, 'delete_category'])->name('delete_category');
    
});


Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_product');

Route::middleware(['auth'])->group(function()
{
Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');

Route::get('password', [ProfileController::class, 'show_password'])->name('show_password');
Route::post('password/edit', [ProfileController::class, 'change_password'])->name('change_password');
Route::get('profile', [ProfileController::class, 'show_profile'])->name('show_profile');
Route::post('profile/edit', [ProfileController::class, 'edit_profile'])->name('edit_profile');

});
Route::get('/locale/{locale}', [LocaleController::class, "set_locale"])->name('set_locale'); 




