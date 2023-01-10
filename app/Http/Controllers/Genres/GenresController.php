<?php

namespace App\Http\Controllers\Genres;

use App\Http\Controllers\Controller;
use App\Models\BooksGenres;
use App\Models\Genres;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genres::all();

        return response()->json($genres, 200);
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
        $genres = Genres::where('name', '=', $request->query('name'))->get();
        echo $genres;
        if (count($genres) != 0) {
            return response()->json(['Genres has been existed', 400]);
        } else {
            $genres = Genres::create($request->all());
            if ($genres) {
                return response()->json(['Create new publisher', 200]);
            } else {
                return response()->json(['Can not create new publisher', 400]);
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
        $genres = Genres::where('id', '=', $id)->get();

        // echo $book[0]->tittle;

        if ($genres != null) {
            return response()->json($genres, 200);
        } else {
            return response()->json(['Can not get publisher', 400]);
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
        
            $books_id = BooksGenres::where('genres_id', '=', $id)
                        ->get('book_id');

            echo $books_id;
            
            Books::where('id', 'IN', $books_id)->delete();
            BooksGenres::where('genres_id', '=', $id)->delete();
            Genres::where('id', '=', $id)->delete();
            
            DB::commit();

            return response()->json(['Remove successful', 200]);
        
        } catch (Throwable $e) {
            DB::rollback();
            return response()->json(['Remove failed', 400]);
        }
    }
}
