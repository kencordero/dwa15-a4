<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Bag;
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
        $orders = Order::where('user_id', '=', Auth::id())->get();

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

        // TODO only show order if it is associated with the current user

        return view('orders.orderDetail')->with([
            'order' => $order,
        ]);
    }
}
