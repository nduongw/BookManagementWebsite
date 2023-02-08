<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();

        return response()->json($orders, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = Orders::create($request->all());
        if ($order != null) {
            return response()->json(['Create order successful', 200]);
        } else {
            return response()->json(['Create order failed', 400]);
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
        $order = Orders::where('customer_id', '=', $id)->get();
        if ($order == null) {
            return response()->json(['Can not show order', 400]);
        } else {
            return response()->json($order, 200);
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
        $order = Orders::find($id);
        if ($order == null) {
            return response()->json(['Cant find this order to edit', 400]);
        } else {
            // var_dump($request->all());
            // echo array($request->all());
            if($order->update($request->all()) == true) {
                return response()->json(['Updated successful', 200]);
            } else {
                return response()->json(['Updated failed', 400]);
            };
            // return $book;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
