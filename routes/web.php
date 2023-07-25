<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BaseController;

//Route::get('/', function () { return view('auth.login'); });
Route::get('/', function () { return view('home'); });

Route::get('/site_admin', [App\Http\Controllers\SiteAdminController::class, 'index'])->name('site_admin');
Route::post('admin_login', [App\Http\Controllers\SiteAdminController::class, 'admin_login']);

Route::get('/category', [App\Http\Controllers\HomeController::class, 'display_category']);

Auth::routes();

Route::group(['middleware' => ['role:Vendor|User']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/adminHome', [App\Http\Controllers\SiteAdminController::class, 'adminHome'])->name('adminHome');
    Route::get('/table', [App\Http\Controllers\SiteAdminController::class, 'table'])->name('table');    
    
    Route::resources([
        'user' => UserController::class,
        'category' => CategoryController::class,
    ]);

    /* User Management Start */
    /*Route::resource('users', UserController::class);*/
    //Route::get('user/delete/{id}', [UserController::class, 'delUsers'])->name('user.delete');
    /* User Management End */

    /* Category Management Start */
    /*Route::resource('category', CategoryController::class);*/
    Route::get('category/delete/{id}', [CategoryController::class, 'delCategory'])->name('category.delete');
    /* Category Management End */

    Route::post('admin_logout', [App\Http\Controllers\SiteAdminController::class, 'admin_logout'])->name('admin_logout');
});