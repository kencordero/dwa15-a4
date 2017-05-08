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

        $bag = Bag::getOrCreateCart();

        return view('bags.showCart')->with([
            'products' => $bag->products,
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
        $bag->addToBag($request->productId);

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
        if (!Auth::check()) {
            Session::flash('message', 'Please login');
        }

        $bag = Bag::placeOrder();
        return view('bags.placeOrder')->with([
            'products' => $bag->products,
        ]);
    }

    /*
     * GET
     * /wishlist
     */
    public function showWishList()
    {
        if (!Auth::check()) {
            Session::flash('message', 'Please login to see your wish list');
            return redirect('/login');
        }

        $bag = Bag::getOrCreateWishList();

        return view('bags.showWishList')->with([
            'products' => $bag->products,
        ]);
    }

    /*
     * POST
     * /wishlist
     */
     public function addToWishList(Request $request)
     {
         if (!Auth::check()) {
             Session::flash('message', 'Please login to add to your wish list');
             return redirect('/login');
         }

         $bag = Bag::getOrCreateWishList();
         $bag->addToBag($request->productId);

         Session::flash('message', 'Added to wish list');

         return redirect('/wishlist');
     }
}
