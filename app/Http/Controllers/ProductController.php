<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /*
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
     *  /products/{id}
     */
    public function showProduct($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            Session:flash('message', 'Product not found');
            return redirect('/products');
        }

        return view('products.showProduct')->with([
            'product' => $product,
        ]);
    }

    public function showRandomProduct()
    {
        $product = Product::inRandomOrder()->first();

        return view('products.showProduct')->with([
            'product' => $product,
        ]);
    }
}
