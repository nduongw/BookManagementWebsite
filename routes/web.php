<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;

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
    return view('welcome');
});

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/store-customers', [CustomerController::class, 'store']);
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit']);
Route::post('/customer/{id}/update-customer', [CustomerController::class, 'update']);
Route::get('/customer/{id}/delete', [CustomerController::class, 'destroy']);



Route::get('/book', [BookController::class, 'index']);
Route::get('/book/create', [BookController::class, 'create']);
Route::post('/store-books', [BookController::class, 'store']);
Route::get('/book/{id}/edit', [BookController::class, 'edit']);
Route::post('/book/{id}/update-book', [BookController::class, 'update']);
Route::get('/book/{id}/delete', [BookController::class, 'destroy']);



Route::get('/publisher', [PublisherController::class, 'index']);
Route::get('/publisher/create', [PublisherController::class, 'create']);
Route::post('/store-publishers', [PublisherController::class, 'store']);
Route::get('/publisher/{id}/edit', [PublisherController::class, 'edit']);
Route::post('/publisher/{id}/update-publisher', [PublisherController::class, 'update']);
Route::get('/publisher/{id}/delete', [PublisherController::class, 'destroy']);