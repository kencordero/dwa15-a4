@extends('layouts.master')

@section('title')
    Foostore: Cart
@endsection

@section('content')
    @foreach($productsInCart as $product)
        <li> {{ $product->name }}, {{ $product->pivot->quantity }}</li>
    @endforeach
    <br>

    <form method="get" action="/cart/checkout">
        <button class="btn btn-primary">Checkout</button>
    </form>
@endsection
