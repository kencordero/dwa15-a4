<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Bag;

class BagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     *  GET
     *  /cart
     */
    public function showCart()
    {
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
         $bag = Bag::getOrCreateWishList();
         $bag->addToBag($request->productId);

         Session::flash('message', 'Added to wish list');

         return redirect('/wishlist');
     }
}
