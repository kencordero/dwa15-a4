<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Bag;

class BagController extends Controller
{
    /*
     *  GET
     *  /cart
     */
    public function showCart()
    {
        $productsInCart = Bag::where('type', '=', 'cart')
            ->where('user_id', '=', Auth::id())->first()->products();
        return view('bags.showCart')->with([
            'productsInCart' => $productsInCart,
        ]);
    }


    /*
     *  POST
     *  /cart
     */
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            Session::flash('message', 'Please login to add to your cart');
            return redirect('/login');
        }

        // if user does not have an active cart, create one
        $cart = Bag::where('type', '=', 'cart')->first();
        if (is_null($cart)) {
            $cart = new Bag();
            $cart->type = 'cart';
            $cart->user_id = Auth::id();
            $cart->save();
            dump('new cart created');
            dump($cart);
        } else {
            dump('cart already exists');
        }
        $cart->products()->attach($request->product_id, ['quantity' => 1,]);


        Session::flash('message', 'Added to cart');

        return redirect('/cart');
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
