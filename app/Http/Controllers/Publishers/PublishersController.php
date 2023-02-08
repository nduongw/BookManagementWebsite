<?php

namespace App\Http\Controllers\Publishers;

use App\Http\Controllers\Controller;
use App\Models\BooksPublishers;
use App\Models\Publishers;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publishers::all();

        return response()->json($publishers, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publisher = Publishers::where('name', 'LIKE', $request->query('name'))->get();
        if (count($publisher) != 0) {
            return response()->json(['Publisher has been existed', 400]);
        } else {
            $publisher = Publishers::create($request->all());
            if ($publisher) {
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
        $publisher = Publishers::where('id', '=', $id)->get();

        // echo $book[0]->tittle;

        if ($publisher != null) {
            return response()->json($publisher, 200);
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
        
            $books_id = BooksPublishers::where('publisher_id', '=', $id)
                        ->get('book_id');

            echo $books_id;
            
            Books::where('id', 'IN', $books_id)->delete();
            BooksPublishers::where('publisher_id', '=', $id)->delete();
            Publishers::where('id', '=', $id)->delete();
            
            DB::commit();

            return response()->json(['Remove successful', 200]);
        
        } catch (Throwable $e) {
            DB::rollback();
            return response()->json(['Remove failed', 400]);
        }
    }
}
