<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
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
        // TODO if user does not have an active cart, create one


        Session::flash('message', 'Added to cart');

        return view('bags.showCart');
    }

    /*
     *  ???
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
