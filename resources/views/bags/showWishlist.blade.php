@extends('layouts.master')

@section('title')
    Foostore: Wishlist
@endsection

@section('content')
    @foreach($productsInCart as $product)
        <li> {{ $product->name }}, {{ $product->pivot->quantity }}</li>
    @endforeach
    <br>
@endsection
