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
        $bag = Bag::where('type', '=', 'cart')->first();
        if (is_null($bag)) {
            $bag = new Bag();
            $bag->type = 'cart';
            $bag->user_id = Auth::id();
            $bag->save();
        }
        $productId = $request->product_id;
        $productIdsInCart = array_pluck($bag->products->toArray(), 'id');

        if (in_array($productId, $productIdsInCart)) {
            // TODO if product already in cart, increment quantity
        } else {
            $bag->products()->attach($productId, ['quantity' => 1,]);
        }

        Session::flash('message', 'Added to cart');

        return redirect('/cart');
    }

    /*
     *  ???
     *  /???
     */
    public function removeFromCart(Request $request)
    {
        // TODO
    }

    /*
     * GET
     * /cart/checkout
     */
    public function checkout()
    {
        return view('bags.checkout');
    }

    /*
     * POST
     * /cart/checkout
     */
    public function placeOrder(Request $request)
    {
        return view('bags.placeOrder');
    }

    /*
     * GET
     * /wishlist
     */
    public function showWishList()
    {
        $bag = Bag::with('products')->where('type', '=', 'wishlist')
            ->where('user_id', '=', Auth::id())->first();

        return view('bags.showWishList')->with([
            'productsOnWishList' => $bag->products,
        ]);
    }

    /*
     * POST
     * /wishlist
     */
     public function addToWishList()
     {
         // TODO
     }
}
