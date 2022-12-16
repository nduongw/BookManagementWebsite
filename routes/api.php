<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/customer/{id}', [CustomerController::class, 'favorite']);
Route::patch('/customer/{id}/updatebyapi', [CustomerController::class, 'updatebyapi']);

// Route::patch('/customer/{id}/updatebyapi', function (Request $request, $id) {
//     $customer = Customer::find($id);
//     $customer->update($request->all());
//     return response()->json($customer, 200);
// });