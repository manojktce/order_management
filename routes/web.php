<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;
use App\Http\Controllers\UserController;

//Route::get('/', function () { return view('auth.login'); });
Route::get('/', function () { return view('home'); });
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('admin_login', [App\Http\Controllers\AdminController::class, 'admin_login']);

Route::get('/category', [App\Http\Controllers\HomeController::class, 'display_category']);

Auth::routes();

Route::group(['middleware' => ['role:Vendor|User']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/adminHome', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('adminHome');
    Route::get('/table', [App\Http\Controllers\AdminController::class, 'table'])->name('table');    
    
    /* User Management */
    Route::resource('users', UserController::class);
    Route::delete('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    Route::post('admin_logout', [App\Http\Controllers\AdminController::class, 'admin_logout'])->name('admin_logout');
});