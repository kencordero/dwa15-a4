<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class BagController extends Controller
{
    /*
     *  GET
     *  /cart
     */
    public function showCart()
    {
        return view('bags.showCart');
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

    public function showWishList()
    {
        return view('bags.showWishList');
    }
}
