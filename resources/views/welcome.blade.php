@extends('layouts.master')

@section('title')
    Foostore
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
            <li><a href="/orders">Orders</a>
        </ul>
    </nav>
@endsection

@section('content')
@endsection