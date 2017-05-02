@extends('layouts.master')

@section('title')
    Foostore: Cart
@endsection

@section('content')
    @foreach($productsInCart as $product)
        <li> {{ $product->name }}</li>
    @endforeach
@endsection
