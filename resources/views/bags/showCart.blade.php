@extends('layouts.master')

@section('title')
    Foostore: Cart
@endsection

@section('content')
    @if ($products->count() > 0)
        @foreach($products as $product)
            <li> {{ $product->name }}, {{ $product->pivot->quantity }}</li>
        @endforeach
        <br>

        <form method="get" action="/cart/checkout">
            <button class="btn btn-primary">Checkout</button>
        </form>
    @else
        <div><i>Looks like your cart is empty. Why don't you peruse our <a href="/products">wares</a>?</i></div>
    @endif
@endsection
