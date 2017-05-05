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
        if (!Auth::check()) {
            Session::flash('message', 'Please login to see cart');
            return redirect('/login');
        }

        $bag = getOrCreateCart();

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

        $bag = Bag::getOrCreateCart();

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
        $bag = Bag::getOrCreateWishList();

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
