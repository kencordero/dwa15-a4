<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Bag;
use Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     *  GET
     *  /orders
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();

        return view('orders.index')->with([
            'orders' => $orders,
        ]);
    }

    /*
     *  GET
     *  /orders/{id}
     */
    public function showOrderDetails($id)
    {
        $order = Order::with('bag')->find($id);

        if ($order->user_id != Auth::id()) {
            Session::flash('message', 'Order not found');
            return redirect('/orders');
        }

        return view('orders.orderDetail')->with([
            'order' => $order,
        ]);
    }
}
