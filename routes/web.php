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

Route::get('/', function () {
    return view('index');
})->name('home');
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('orders', \App\Http\Controllers\OrderController::class)->except([
    'create', 'edit' , 'destroy'
]);


