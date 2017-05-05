@extends('layouts.master')

@section('title')
    Foostore: {{ $product->name }}
@endsection

@section('content')
    <h3 class="text-center">{{ $product->name }}</h3>
    <img src="/images/{{ $product->image_file }}">
    <form method="post" action="/cart">
        {{ csrf_field() }}
        <input type="hidden" name="productId" value="{{ $product->id }}">
        <input type="submit" class="btn btn-primary" value="Add to cart">
    </form>
    <form method="post" action="/wishlist">
        {{ csrf_field() }}
        <input type="hidden" name="productId" value="{{ $product->id }}">
        <input type="submit" class="btn btn-success" value="Add to wishlist">
    </form>
    <div>${{ number_format($product->price, 2) }}</div>
@endsection
