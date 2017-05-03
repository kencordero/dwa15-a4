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
        $bag = Bag::with('products')->where('type', '=', 'cart')
            ->where('user_id', '=', Auth::id())->first();

        return view('bags.showCart')->with([
            'productsInCart' => $bag->products,
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
        }
        $cart->products()->attach($request->product_id, ['quantity' => 1,]);


        Session::flash('message', 'Added to cart');

        return redirect('/cart');
    }

    /*
     *  ???
     *  /???
     */
    public function removeFromCart()
    {
        // TODO
    }

    /*
     * GET
     * /wishlist
     */
    public function showWishList()
    {
        return view('bags.showWishList');
    }
}
