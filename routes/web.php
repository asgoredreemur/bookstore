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
Route::get('add-to-cart/{id}', [App\Http\Controllers\BooksController::class, 'addToCart'])->middleware('auth');
Route::get('update-cart', [App\Http\Controllers\BooksController::class, 'update']);
Route::delete('remove-from-cart', [App\Http\Controllers\BooksController::class, 'remove']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
