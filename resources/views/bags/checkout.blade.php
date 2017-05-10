@extends('layouts.master')

@section('title')
    FooStore: Check out
@endsection

@section('content')
    @if($products->count() > 0)
    <ul>
        @foreach($products as $product)
        <li>{{ $product->name }}, {{ $product->pivot->quantity }}</li>
        @endforeach
    </ul>
    <form method="post" action="/cart/checkout">
        {{ csrf_field() }}
        <button class="btn btn-primary">Place order</button>
    </form>
    @else
        <div><i>You can't check out because your cart is empty.</i></div>
    @endif
@endsection