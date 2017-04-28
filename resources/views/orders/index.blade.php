@extends('layouts.master')

@section('title')
    Foostore: Orders
@endsection

@section('header')
    <nav class="nav navbar">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">FooStore</a>
        </div>
        <ul class="nav nav-pills navbar-inverse nav-justified">
            <li><a href="/products">Products</a>
            <li><a href="/wishlist">Wishlist</a>
            <li><a href="/cart">Cart</a>
            <li class="active"><a href="/orders">Orders</a>
        </ul>
    </nav>
@endsection

@section('content')
    @foreach ($orders as $order)
        <a href="/orders/{{ $order->id }}">{{ $order->created_at }}</a>
    @endforeach
@endsection
