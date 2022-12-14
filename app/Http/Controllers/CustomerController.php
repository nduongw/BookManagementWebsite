<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers.create');
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
        $data = request()->all();

        $customer = new Customer();
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->address = $data['address'];
        $customer->phone = $data['phone'];
        $customer->username = $data['username'];
        $customer->password = bcrypt($data['password']);

        $customer->last_updated = date('Y-m-d H:i:s');
        $customer->created_date = date('Y-m-d H:i:s');

        $customer->save();

        return redirect('/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $customer = Customer::find($id);
        return view('customers.edit')->with('customer', $customer);
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
        $customer = Customer::find($id);

        $data = request()->all();
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->address = $data['address'];
        $customer->phone = $data['phone'];
        $customer->username = $data['username'];
        // $customer->password = bcrypt($data['password']);

        $customer->last_updated = date('Y-m-d H:i:s');
        $customer->save();

        return redirect('/customer');
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
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customer');
    }
}
