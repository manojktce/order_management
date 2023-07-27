<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


//Route::get('/', function () { return view('auth.login'); });
Route::get('/', function () { return view('home'); });

Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');

Route::get('/site_admin', [App\Http\Controllers\SiteAdminController::class, 'index'])->name('site_admin');
Route::post('admin_login', [App\Http\Controllers\SiteAdminController::class, 'admin_login']);


Auth::routes();

Route::group(['middleware' => ['role:User']], function () {
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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