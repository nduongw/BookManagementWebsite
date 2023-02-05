<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\BooksGenres;
use Illuminate\Http\Request;

class BooksGenresController extends Controller
{
    public function get_book_by_genres($id) {
        $books = BooksGenres::where('genres_id', '=', $id)->all();

        if ($books != null) {
            return response()->json($books, 200);
        } else {
            return response()->json(['Can not find books by genres', 400]);
        }
    }
}
