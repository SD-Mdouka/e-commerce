<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.orders.index")->with([
            "orders" => Order::latest()->paginate(10),
        ]);
    }
    public function update(Request $request, Order $order)
    {
        //
        $request->validate();
        $order->update([
            "delivered" => 1
        ]);
        return redirect()->back()->withSuccess("Order updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();
        return redirect()->back()->withSuccess("Order deleted");
    }
}
