<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Product;

class ProductController extends Controller
{
    /*
     *  GET
     *  /products
     */
    public function index()
    {
        $products = Product::inRandomOrder()->get();
        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    /*
     *  GET
     *  /products/{id}
     */
    public function showProduct($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            Session::flash('message-error', 'Product not found');
            return redirect('/products');
        }

        return view('products.showProduct')->with([
            'product' => $product,
        ]);
    }

    /*
     *  GET
     *  /products/random
     */
    public function showRandomProduct()
    {
        $product = Product::inRandomOrder()->first();

        return view('products.showProduct')->with([
            'product' => $product,
        ]);
    }
}
