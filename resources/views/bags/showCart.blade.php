@extends('layouts.master')

@section('title')
    Foostore: Cart
@endsection

@section('content')
    @if ($products->count() > 0)
        <div class="row">
            <div class="col-md-offset-2 col-md-2">
                <b>Item</b>
            </div>
            <div class="col-md-2">
                <b>Quantity</b>
            </div>
            <div class="col-md-2">
                <b>Unit price</b>
            </div>
        </div>
        <br>
        @foreach($products as $product)
            <div class="row">
                <div class="itemtext col-md-offset-2 col-md-2">
                    {{ $product->name }}
                </div>
                <div class="itemtext col-md-2">
                    {{ $product->pivot->quantity }}
                </div>
                <div class="itemtext col-md-2">
                    {{ $product->price }}
                </div>
                <div class="col-md-2">
                    <form method="post" action="/cart/product">
                        {{ csrf_field() }}
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-danger" value="Remove from cart">
                    </form>
                </div>
            </div>
            <br>
        @endforeach
        <br>
        <div class="text-center">
        <a href="/cart/checkout">Checkout</a>
        </div>
    @else
        <div><i>Looks like your cart is empty. Why don't you peruse our <a href="/products">wares</a>?</i></div>
    @endif
@endsection
