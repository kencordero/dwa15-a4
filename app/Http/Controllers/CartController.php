<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends Controller
{
    /*
     *  GET
     *  /cart
     */
    public function index()
    {
        // TODO
        return view('cart.index');
    }

    /*
     *  POST
     *  /cart
     */
    public function addToCart()
    {
        // TODO
    }

    /*
     *  DELETE
     *  /cart
     */
    public function removeFromCart()
    {
        // TODO
    }
}
