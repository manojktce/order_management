<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrdersController;


//Route::get('/', function () { return view('auth.login'); });
Route::get('/', function () { return view('home'); });

Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/products/{slug}/{id}', [App\Http\Controllers\HomeController::class, 'product_detail']);

Route::get('/site_admin', [App\Http\Controllers\SiteAdminController::class, 'index'])->name('site_admin');
Route::post('admin_login', [App\Http\Controllers\SiteAdminController::class, 'admin_login']);

Auth::routes();

Route::group(['middleware' => ['role:User']], function () {
    /* Cart Controller Start*/
    Route::get('showCart', [CartController::class, 'showCart'])->name('showCart');
    Route::get('addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('updateCart/{row_id}', [CartController::class, 'updateCart'])->name('updateCart');
    Route::get('deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');
    Route::get('clearCart', [CartController::class, 'clearCart'])->name('clearCart');
    /* Cart Controller End*/

    /* Payment Controller Start */
    Route::post('purchase',[PaymentController::class, 'purchase_items'])->name('purchase');
    /* Payment Controller End */

    /* Order Controller Start */
    Route::get('my_orders',[OrdersController::class, 'orders_list'])->name('my_orders');
    Route::get('order_details/{id}',[OrdersController::class, 'order_details'])->name('order_details');
    /* Orders Controller End */
});

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/adminHome', [App\Http\Controllers\SiteAdminController::class, 'adminHome'])->name('adminHome');
    
    Route::resources([
        'user'          => UserController::class,
        'category'      => CategoryController::class,
        'product'       => ProductController::class,
    ]);

    Route::post('admin_logout', [App\Http\Controllers\SiteAdminController::class, 'admin_logout'])->name('admin_logout');
});