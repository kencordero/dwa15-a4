<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Bag;
use App\Product;

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
        $product = Product::find($request->productId);
        if ($product == null) {
            Session::flash('message-danger', 'Product not found');
            return redirect('/cart');
        }

        $bag = Bag::getOrCreateCart();
        $bag->addToBag($product->id);

        Session::flash('message-success', 'Added '.$product->name.' to cart');

        return redirect('/cart');
    }

    /*
     *  POST
     *  /wishlist/product
     */
    public function removeFromWishlist(Request $request)
    {
        $bag = Bag::getOrCreateWishlist();
        $bag->removeFromBag($request->productId);

        Session::flash('message-warning', 'Item removed from wishlist');
        return redirect('/wishlist');
    }

    /*
     * POST
     * /cart/product
     */
    public function removeFromCart(Request $request)
    {
        $bag = Bag::getOrCreateCart();
        $bag->removeFromBag($request->productId);

        Session::flash('message-warning', 'Item removed from cart');
        return redirect('/cart');
    }

    /*
     * POST
     * /wishlist/cart
     */
    public function moveToCart(Request $request)
    {
        $wishlist = Bag::getOrCreateWishlist();
        $cart = Bag::getOrCreateCart();

        $cart->addToBag($request->productId);
        $wishlist->removeFromBag($request->productId);

        Session::flash('message-success', 'Item moved to cart');
        return redirect('/cart');
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

        Session::flash('message-success', 'Congratulations, your order has been placed! Thank you for your patronage.');

        return redirect('/orders/'.$bag->order->id);
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

         Session::flash('message-success', 'Added to wish list');

         return redirect('/wishlist');
     }
}
