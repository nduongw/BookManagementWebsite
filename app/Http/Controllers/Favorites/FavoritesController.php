<?php

namespace App\Http\Controllers\Favorites;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorites::all();

        return response()->json($favorites, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $favorite = Favorites::create($request->all());
        if ($favorite != null) {
            return response()->json(['Created successful', 200]);
        } else {
            return response()->json(['Create failed', 400]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorite = Favorites::where('customer_id', '=', $id)->get();
        if ($favorite == null) {
            return response()->json(['Can not get customer favorite', 400]);
        } else {
            return response()->json($favorite, 200);
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
    public function destroy($id, $book_id)
    {
        $favorite = Favorites::where([['book_id', '=', $book_id], ['customer_id', '=', $id]])->delete();
        
        if ($favorite != null) {
            return response()->json(['Deleted successful', 200]);
        } else {
            return response()->json(['Delete failed', 400]);
        }
    }
}
