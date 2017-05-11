@extends('layouts.master')

@section('title')
    Foostore: {{ $product->name }}
@endsection

@section('content')
    <div class="row">
        <h3 class="col-md-6 text-center">{{ $product->name }}</h3>
    </div>
    <div class="col-md-6">
        <img src="/images/{{ $product->image_file }}">
    </div>
    <br>
    <form method="post" action="/cart">
        {{ csrf_field() }}
        <input type="hidden" name="productId" value="{{ $product->id }}">
        <input type="submit" class="btn btn-primary" value="Add to cart">
    </form>
    <br>
    <form method="post" action="/wishlist">
        {{ csrf_field() }}
        <input type="hidden" name="productId" value="{{ $product->id }}">
        <input type="submit" class="btn btn-success" value="Add to wishlist">
    </form>
    <br>
    <div>${{ number_format($product->price, 2) }}</div>
@endsection
