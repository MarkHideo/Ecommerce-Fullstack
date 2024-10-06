<?php

use App\Http\Controllers\Admin\menuController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\uploadController;
use App\Http\Controllers\categoryController;
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
        //product
        Route::get('product/list', [productController::class,'list_product']);
        Route::get('product/create', [productController::class,'add_product']);
        //order
        Route::get('/admin/order/delete', [orderController::class,'delete_order']);
        Route::get('order/list', [orderController::class,'list_order']);
        Route::get('order/detail/{order_detail}', [orderController::class,'detail_order']);
        //menu
        Route::get('menu/addmenu', [menuController::class, 'add_menu']);
        Route::get('menu/listmenu', [menuController::class, 'list_menu']);
    });
});

//menu
Route::post('/admin/menu/addmenu', [menuController::class, 'store']);
Route::get('/admin/menu/delete/', [menuController::class, 'delete_menu']);
Route::get('/admin/menu/editmenu/{id}', [menuController::class, 'edit_menu']);
Route::post('/admin/menu/editmenu/{id}', [menuController::class, 'update_menu']);

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
Route::get('/category/{id}', [FrontendController::class, 'showCategory'])->name('category.show');
Route::get('/all-products', [FrontendController::class, 'showAllProducts'])->name('products.all');

//cart
Route::post('/cart/add', [FrontendController::class,'add_cart']);
Route::get('/cart', [FrontendController::class,'show_cart']);
Route::get('/cart/delete/{id}', [FrontendController::class,'delete_cart']);
Route::post('/cart/update', [FrontendController::class,'update_cart']);
Route::post('/cart/send', [FrontendController::class,'send_cart']);


