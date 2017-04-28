<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /*
     *  GET
     *  /orders
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index')->with([
            'orders' => $orders,
        ]);
    }

    /*
     *  GET
     *  /orders/{id}
     */
    public function showOrderDetails()
    {
        $order = Order::find($id);
        return view('orders.orderDetail')->with([
            'order' => $order,
        ]);
    }
}
