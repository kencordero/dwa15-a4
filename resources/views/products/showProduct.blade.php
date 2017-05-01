@extends('layouts.master')

@section('title')
    Foostore: {{ $product->name }}
@endsection

@section('header')
    <nav class="nav navbar">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">FooStore</a>
        </div>
        <ul class="nav nav-pills navbar-inverse nav-justified">
            <li class="active"><a href="/products">Products</a>
            <li><a href="/wishlist">Wishlist</a>
            <li><a href="/cart">Cart</a>
            <li><a href="/orders">Orders</a>
        </ul>
    </nav>
@endsection

@section('content')
    <h3 class="text-center">{{ $product->name }}</h3>
    <img src="/images/{{ $product->image_file }}">
    <form method="post" action="/cart">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="submit" class="btn btn-default" value="Add to cart">
    </form>
    <div>${{ number_format($product->price, 2) }}</div>
@endsection