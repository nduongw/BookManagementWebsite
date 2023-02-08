<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\BooksPublishers;
use App\Models\Publishers;
use Illuminate\Http\Request;

class BooksPublishersController extends Controller
{
    public function get_book_by_publisher($id) {
        // return books by publisher
        $books = BooksPublishers::where('publisher_id', '=', $id)->all();

        if ($books != null) {
            return response()->json($books, 200);
        } else {
            return response()->json(['Can not find books by publisher', 400]);
        }
    }
}
