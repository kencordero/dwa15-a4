@extends('layouts.master')

@section('title')
    Foostore: Wishlist
@endsection

@section('content')
    @if ($products->count() > 0)
        @foreach($products as $product)
            <li> {{ $product->name }}, {{ $product->pivot->quantity }}</li>
        @endforeach
        <br>
    @else
        <div><i>Looks like your wish list is empty. Why don't you peruse our <a href="/products">wares</a>?</i></div>
    @endif
@endsection
