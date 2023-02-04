<?php

use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\Carts\CartsController;
use App\Http\Controllers\Customers\CustomersController;
use App\Http\Controllers\Favorites\FavoritesController;
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

# -----------------------User API part-----------------------

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

#Favorite API
Route::get('favorites/index', [FavoritesController::class, 'index']);
Route::get('favorites/show/{id}', [FavoritesController::class, 'show']);
Route::delete('favorites/{id}/{book_id}', [FavoritesController::class, 'destroy']);
Route::post('favorites/create', [FavoritesController::class, 'create']);

#Cart API
Route::get('carts/index', [CartsController::class, 'index']);
Route::get('carts/show/{id}', [CartsController::class, 'show']);
Route::delete('carts/{id}/{book_id}', [CartsController::class, 'destroy']);
Route::post('carts/create', [CartsController::class, 'create']);
Route::put('carts/{id}',[CartsController::class, 'update']);

# -----------------------Admin API part-----------------------
