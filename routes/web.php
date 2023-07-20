<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () { return view('auth.login'); });
Route::get('/', function () { return view('home'); });
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('admin_login', [App\Http\Controllers\AdminController::class, 'admin_login']);

Auth::routes();

Route::group(['middleware' => ['role:Vendor|User']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/adminHome', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('adminHome');
    Route::get('/table', [App\Http\Controllers\AdminController::class, 'table'])->name('table');    
});