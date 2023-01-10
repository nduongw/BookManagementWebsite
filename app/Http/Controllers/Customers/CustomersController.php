<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all();

        return response()->json($customers, 200);
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
        $customer = Customers::find($id);

        if ($customer == null) {
            return response()->json(['Can not get customer information', 400]);
        } else {
            return response()->json($customer, 200);
        }
    }

    public function login(Request $request) {
        $customer = Customers::where([['phone', '=', $request->phone], ['password', '=', $request->password]])->first();
        if ($customer == null) {
            return response()->json(['Account does not exist', 400]);
        }

        return response()->json($customer, 200);

        // echo Hash::check($customer['password'], $request->password);
        // if (Hash::check($request->password, $customer['password'])) {
        //     return response()->json($customer, 200);
        // } else {
        //     return response()->json(['Login failed', 400]);
        // }

    }
    

    public function register(Request $request) {
        $customer = Customers::where('phone', '=', $request->phone)->get();
        if (count($customer) > 0) {
            // echo $customer;
            return response()->json(['User has existed', 400]);
        }

        $customer = Customers::create([
            'username' => 'default_username',
            'last_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
            "money_spent" => 0
        ]);

        if ($customer != null) {
            return $customer;
        } else {
            return \response()->json(['Register failed', 400]);
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
        $customer = Customers::find($id);
        if ($customer == null) {
            return response()->json(['Can not get customer information', 400]);
        } else {
            $customer->update($request->all());
            return response()->json(["Updated successful", 200]);
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

    public function most_spending_customers() {
        $customers = Customers::orderBy('money_spent', 'desc')->limit(5)->get();
        return response()->json($customers, 200);
    }

    public function most_order_customers() {
        // $orders = Orders::select(['customer_id', 'COUNT(customer_id)'])->groupBy('customer_id');

        // return response()->json($orders, 200);
        $orders = DB::table('orders')
                    ->selectRaw('customer_id, COUNT(customer_id) AS total_orders')
                    ->groupBy('customer_id')
                    ->orderBy('total_orders', 'desc')
                    ->get();
        return response()->json($orders, 200);

    }
}
