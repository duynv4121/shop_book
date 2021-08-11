<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SachProduct;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuanTriAdminController;
use App\Http\Controllers\TypeBookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FeeShipController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartManagerController;



Route::get('/', function () {
    return view('layout.index');
});


Route::get('/detail/{id}',[SachProduct::class, 'detail']);
Route::get('/product',[SachProduct::class, 'product']);
Route::get('/stl/{id}',[SachProduct::class, 'stl']);
Route::post('/timkiem',[SachProduct::class, 'search']);
Route::get('/login',[LoginController::class, 'login']);
Route::post('/login',[LoginController::class, 'postAuthLogin']);




Route::get('/logout-user',[LoginController::class, 'logoutUser']);
Route::get('/quantri',[QuanTriAdminController::class, 'index']);


Route::get('/admin',[QuanTriAdminController::class, 'index']);
Route::get('/dashboard',[QuanTriAdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard',[QuanTriAdminController::class, 'dashboard']);
Route::get('/logout',[QuanTriAdminController::class, 'logout']);




//Category type_book
Route::resource('type-book',  App\Http\Controllers\TypeBookController::class);
Route::get('/type-book',[TypeBookController::class, 'index']);
Route::get('/add-type-book',[TypeBookController::class, 'create']);


//Sach Product
Route::resource('sach',  App\Http\Controllers\SachController::class);

//Cart
Route::post('/addcartajax',[CartController::class, 'add_cart_ajax']);
Route::get('/gio-hang',[CartController::class, 'gio_hang']);
Route::post('/update-cart',[CartController::class, 'update_cart']);
Route::get('/delete-product/{session_id}',[CartController::class, 'delete_product']);
Route::get('/delete-cart',[CartController::class, 'delete_cart']);

Route::post('/check-coupon',[CartController::class, 'check_coupon']);
Route::get('/delete-coupon',[CartController::class, 'delete_coupon']);

//Coupon admin
Route::resource('coupon',  App\Http\Controllers\CouponController::class);

//FeeShip

Route::get('/fee-ship',[FeeShipController::class, 'index']);
Route::post('/select-delivery',[FeeShipController::class, 'select_delivery']);
Route::post('/insert-delivery',[FeeShipController::class, 'insert_delivery']);
Route::get('/update',[FeeShipController::class, 'update']);


//Checkout
Route::get('/check-out',[CheckoutController::class, 'check_out']);
Route::post('/check-fee',[CheckoutController::class, 'check_fee']);
Route::post('/buy-product',[CheckoutController::class, 'buy_product']);


//Cart manager
Route::get('/manager-cart',[CartManagerController::class, 'index']);
Route::get('/view-order/{fee_code}',[CartManagerController::class, 'view_order']);
