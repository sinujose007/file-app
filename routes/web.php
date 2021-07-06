<?php

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

Route::get('/', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');
Route::get('/users', 'App\Http\Controllers\DashboardController@users')->middleware(['auth'])->name('userlist');
Route::get('/createuser', 'App\Http\Controllers\DashboardController@createuser')->middleware(['auth'])->name('create');
//Route::get('/upload', 'App\Http\Controllers\DashboardController@upload')->middleware(['auth'])->name('upload');

//Route::get('products/{id}', 'App\Http\Controllers\ProductsController@buy')->middleware(['auth'])->name('single');
Route::post('submituser', 'App\Http\Controllers\DashboardController@submituser')->middleware(['auth'])->name('submituser');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->middleware(['auth'])->name('home');
Route::get('/createfile', 'App\Http\Controllers\HomeController@upload')->middleware(['auth'])->name('createfile');

Route::post('submitfiles', 'App\Http\Controllers\HomeController@submitfiles')->middleware(['auth'])->name('submitfiles');


require __DIR__.'/auth.php';
