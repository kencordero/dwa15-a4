@extends('layouts.master')

@section('title')
    Foostore: {{ $product->name }}
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
