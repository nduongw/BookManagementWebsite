<?php

namespace App\Http\Controllers\Authors;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Books;
use App\Models\BooksAuthors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Authors::all();

        return response()->json($authors, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = Authors::where('name', 'LIKE', $request->query('name'))->get();
        if (count($author) != 0) {
            return response()->json(['Author has been existed', 400]);
        } else {
            $author = Authors::create($request->all());
            if ($author) {
                return response()->json(['Created new author', 200]);
            } else {
                return response()->json(['Can not create new author', 400]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Authors::where('id', '=', $id)->get();

        // echo $book[0]->tittle;

        if ($author != null) {
            return response()->json($author, 200);
        } else {
            return response()->json(['Can not get book', 400]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
        
            $books_id = BooksAuthors::where('author_id', '=', $id)
                        ->get('book_id');

            echo $books_id;
            
            Books::where('id', 'IN', $books_id)->delete();
            BooksAuthors::where('author_id', '=', $id)->delete();
            Authors::where('id', '=', $id)->delete();
            
            DB::commit();

            return response()->json(['Remove successful', 200]);
        
        } catch (Throwable $e) {
            DB::rollback();
            return response()->json(['Remove failed', 400]);
        }
    }
}
