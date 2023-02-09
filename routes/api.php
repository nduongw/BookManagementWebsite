<?php

use App\Http\Controllers\Authors\AuthorsController;
use App\Http\Controllers\Authors\BooksAuthorsController;
use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\Books\BooksGenresController;
use App\Http\Controllers\Books\BooksPublishersController;
use App\Http\Controllers\Carts\CartsController;
use App\Http\Controllers\Customers\CustomersController;
use App\Http\Controllers\Favorites\FavoritesController;
use App\Http\Controllers\Genres\GenresController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Controllers\Publishers\PublishersController;
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
Route::get('customers/index', [CustomersController::class, 'index']);

#Book API
Route::get('books/index', [BooksController::class, 'index']);
Route::get('books/show/{id}', [BooksController::class, 'show']);
Route::get('books/search/{search_string}', [BooksController::class, 'search']);
Route::delete('books/{id}', [BooksController::class, 'destroy']);
Route::patch('books/{id}', [BooksController::class, 'edit']);
Route::put('books/{id}', [BooksController::class, 'update']);
Route::post('books/create', [BooksController::class, 'create']);
Route::get('books/get-books-by-authors/{id}', [BooksAuthorsController::class, 'get_book_by_author']);
Route::get('books/get-books-by-genres/{id}', [BooksGenresController::class, 'get_book_by_genres']);
Route::get('books/get-books-by-publishers/{id}', [BooksPublishersController::class, 'get_book_by_publisher']);
Route::get('books/get-publisher-by-book/{id}', [BooksPublishersController::class, 'get_publisher_by_book']);

# User information API
Route::get('users/show/{id}', [CustomersController::class, 'show']);
Route::patch('users/{id}', [CustomersController::class, 'update']);
Route::post('users/register', [CustomersController::class, 'register']);
Route::post('users/login', [CustomersController::class, 'login']);

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

# Order API
Route::get('orders/index', [OrdersController::class, 'index']);
Route::get('orders/show/{id}', [OrdersController::class, 'show']);
Route::post('orders/create', [OrdersController::class, 'create']);
Route::put('orders/{id}',[OrdersController::class, 'update']);

# Other API
Route::get('authors/index', [AuthorsController::class, 'index']);
Route::get('genres/index', [GenresController::class, 'index']);
Route::get('publishers/index', [PublishersController::class, 'index']);

# -----------------------Admin API part-----------------------

#Statistics API
Route::get('users/spent', [CustomersController::class, 'most_spending_customers']);
Route::get('users/most-order', [CustomersController::class, 'most_order_customers']);
Route::get('books/best-seller', [BooksController::class, 'best_sell_book']);

#Publisher API
Route::post('publishers/create', [PublishersController::class, 'store']);
Route::delete('publishers/{id}', [PublishersController::class, 'destroy']);

#Genres API
Route::post('genres/create', [GenresController::class, 'store']);
Route::delete('genres/{id}', [GenresController::class, 'destroy']);

#Author API
Route::post('authors/create', [AuthorsController::class, 'create']);
Route::delete('authors/{id}', [AuthorsController::class, 'destroy']);