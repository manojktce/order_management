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

Route::get('/', function () { return view('auth.login'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adminHome', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('adminHome')->middleware('can:adminHome');
Route::get('/table', [App\Http\Controllers\HomeController::class, 'table'])->name('table');