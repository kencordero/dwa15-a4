@extends('layouts.master')

@section('title')
    FooStore: Check out
@endsection

@section('content')
    @if($products->count() > 0)
        <div class="row">
            <div class="col-md-offset-3 col-md-2">
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
                <div class="col-md-offset-3 col-md-2">
                    {{ $product->name }}
                </div>
                <div class="col-md-2">
                    {{ $product->pivot->quantity }}
                </div>
                <div class="col-md-2">
                    {{ $product->price }}
                </div>
            </div>
            <br>
        @endforeach
        <br>
        <div class="text-center">
        <form method="post" action="/cart/checkout">
            {{ csrf_field() }}
            <button class="btn btn-primary">Place order</button>
        </form>
        </div>
    @else
        <div><i>You can't check out because your cart is empty.</i></div>
    @endif
@endsection