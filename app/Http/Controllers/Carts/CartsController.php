<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Carts::all();

        return response()->json($carts, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cart_item = Carts::create($request->all());
        // echo $cart_item;
        // if ($cart_item != null) {
        //     return response()->json(['Add to cart successful', 200]);
        // } else {
        //     return response()->json(['Add to cart failed', 400]);
        // }
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
        $cart_info = Carts::where('customer_id', '=', $id)->get();
        if ($cart_info == null) {
            return response()->json(['Can not cart information', 400]);
        } else {
            return response()->json($cart_info, 200);
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
        $cart_item = Carts::where([['book_id', '=', $request->book_id], ['customer_id', '=', $id]])->first();

        if ($cart_item == null) {
            return response()->json(['Can not find cart item', 400]);
        } else {
            $cart_item->update(['quantity' => $request->quantity]);
            return response()->json(['Updated successful', 200]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $book_id)
    {
        $cart_item = Carts::where([['book_id', '=', $book_id], ['customer_id', '=', $id]])->delete();
        
        if ($cart_item != null) {
            return response()->json(['Deleted successful', 200]);
        } else {
            return response()->json(['Delete failed', 400]);
        }
    }
}
