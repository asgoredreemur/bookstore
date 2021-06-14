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

Route::get('/', [App\Http\Controllers\BooksController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BooksController::class, 'show']);
Route::get('/cart', [App\Http\Controllers\BooksController::class, 'cart'])->middleware('auth');
Route::post('/books', [App\Http\Controllers\BooksController::class, 'store']);
Route::get('/checkout', [App\Http\Controllers\BooksController::class, 'checkout']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
