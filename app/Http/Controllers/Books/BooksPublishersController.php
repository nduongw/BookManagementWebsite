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

    public function get_publisher_by_book($id) {
        // return publisher by book
        $publisher = BooksPublishers::where('book_id', '=', $id)->get('publisher_id');
        if (count($publisher) != 0) {
            $publisher_name = Publishers::where('id', '=', $publisher[0]['publisher_id'])->get('name');
            if ($publisher_name != null) {
                return response()->json($publisher_name, 200);
            } else {
                return response()->json(['Can not find publisher by book', 400]);
            }
        } else {
            return response()->json(['Can not find publisher by book', 400]);
        }
    }
}
