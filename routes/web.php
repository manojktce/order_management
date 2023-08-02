<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\VendorProductController;

use App\Http\Controllers\UserOrdersController;
use App\Http\Controllers\VendorOrdersController;




//Route::get('/', function () { return view('auth.login'); });
Route::get('/', function () { return view('home'); });

Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/products/{slug}/{id}', [App\Http\Controllers\HomeController::class, 'product_detail']);

Route::get('/site_admin', [App\Http\Controllers\SiteAdminController::class, 'index'])->name('site_admin');
Route::post('admin_login', [App\Http\Controllers\SiteAdminController::class, 'admin_login']);

Auth::routes();

/* Vendor Routes Start */
Route::group(['middleware' => ['role:Vendor']], function () {
    
    /* Vendor Product Management Start */
    Route::resource('vendor_product',VendorProductController::class);
    /* Vendor Product Management End */

    /* Order Controller Start */
    Route::get('vendor_orders',[VendorOrdersController::class, 'orders_list'])->name('vendor_orders');
    Route::get('vendor_order_details/{id}',[VendorOrdersController::class, 'order_details'])->name('vendor_order_details');
    /* Orders Controller End */
});
/* Vendor Routes End */


/* User Routes Start */
Route::group(['middleware' => ['role:User']], function () {
    /* Order Controller Start */
    Route::get('my_orders',[UserOrdersController::class, 'orders_list'])->name('my_orders');
    Route::get('order_details/{id}',[UserOrdersController::class, 'order_details'])->name('order_details');
    /* Orders Controller End */
});
/* User Routes End */

/* Cart Routes Start*/
Route::get('showCart', [CartController::class, 'showCart'])->name('showCart');
Route::get('addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('updateCart/{row_id}/{option}', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');
Route::get('clearCart', [CartController::class, 'clearCart'])->name('clearCart');
/* Cart Routesr End*/

/* Payment Controller Start */
Route::post('purchase',[PaymentController::class, 'purchase_items'])->name('purchase');
/* Payment Controller End */


/* Admin Routes Start */
Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/adminHome', [App\Http\Controllers\SiteAdminController::class, 'adminHome'])->name('adminHome');
    
    Route::resources([
        'user'          => UserController::class,
        'category'      => CategoryController::class,
        'product'       => ProductController::class,
        'order'         => OrderController::class,
    ]);

    Route::post('admin_logout', [App\Http\Controllers\SiteAdminController::class, 'admin_logout'])->name('admin_logout');
});
/* Admin Routes End */