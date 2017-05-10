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
        $bag = Bag::getOrCreateCart();
        return view('bags.checkout')->with([
            'products' => $bag->products,
        ]);
    }

    /*
     * POST
     * /cart/checkout
     */
    public function placeOrder(Request $request)
    {
        $bag = Bag::placeOrder();

        if (config('app.env') == 'local') {
            dump($bag);
        }

        return view('bags.placeOrder');
    }

    /*
     * GET
     * /wishlist
     */
    public function showWishlist()
    {
        $bag = Bag::getOrCreateWishlist();

        return view('bags.showWishlist')->with([
            'products' => $bag->products,
        ]);
    }

    /*
     * POST
     * /wishlist
     */
     public function addToWishlist(Request $request)
     {
         $bag = Bag::getOrCreateWishlist();
         $bag->addToBag($request->productId);

         Session::flash('message', 'Added to wish list');

         return redirect('/wishlist');
     }
}
