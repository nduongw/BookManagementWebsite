<?php

use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\Customers\CustomersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Book API
Route::get('books/index', [BooksController::class, 'index']);
Route::get('books/show/{id}', [BooksController::class, 'show']);
Route::delete('books/{id}', [BooksController::class, 'destroy']);
Route::patch('books/{id}', [BooksController::class, 'edit']);
Route::put('books/{id}', [BooksController::class, 'update']);
Route::post('books/create', [BooksController::class, 'create']);

# User information API
Route::get('users/show/{id}', [CustomersController::class, 'show']);
Route::patch('users/{id}', [CustomersController::class, 'update']);