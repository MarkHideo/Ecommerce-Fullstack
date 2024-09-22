<?php

use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\uploadController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SearchController;
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

//login
Route::get('/login', [FrontendController::class,'show_login'])->name('login');
Route::post('/check_login', [FrontendController::class,'check_login']);

//Admin

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {return view('admin.home');});
        Route::get('product/list', [productController::class,'list_product']);
        Route::get('product/create', [productController::class,'add_product']);
        Route::get('order/list', [orderController::class,'list_order']);
        Route::get('order/detail/{order_detail}', [orderController::class,'detail_order']);
    });
});

//order
Route::get('/admin/order/delete', [orderController::class,'delete_order']);

//product
Route::post('/admin/product/add', [productController::class,'insert_product']);
Route::get('/admin/product/delete', [productController::class,'delete_product']);
Route::get('/admin/product/edit/{id}', [productController::class,'edit_product']);
Route::post('/admin/product/edit/{id}', [productController::class,'update_product']);


//upload
Route::post('/upload',[uploadController::class,'uploadImage']);
Route::post('/uploads',[uploadController::class,'uploadImages']);

//frontend
Route::get('/', [FrontendController::class,'index']);
Route::get('/product/{id}', [FrontendController::class,'show_product']);
Route::get('/order/confirm',[FrontendController::class,'order_confirm']);
Route::get('/order/success', function () {return view('order.success');});
Route::get('/search', [SearchController::class,'search'])->name('search');
Route::get('/order/confirm/{token}', [FrontendController::class, 'check_email']);

//cart
Route::post('/cart/add', [FrontendController::class,'add_cart']);
Route::get('/cart', [FrontendController::class,'show_cart']);
Route::get('/cart/delete/{id}', [FrontendController::class,'delete_cart']);
Route::post('/cart/update', [FrontendController::class,'update_cart']);
Route::post('/cart/send', [FrontendController::class,'send_cart']);


