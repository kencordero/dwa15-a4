@extends('layouts.master')

@section('title')
    Foostore: Orders
@endsection

@section('content')
    <div class="row">
        <div class="col-md-offset-4 col-md-2"><b>Item</b></div>
        <div class="col-md-2"><b>Price</b></div>
        <div class="col-md-2"><b>Quantity</b></div>
    </div>
    <hr>
    @foreach($order->bag->products as $product)
        <div class="row">
            <div class="col-md-offset-4 col-md-2">{{ $product->name }}</div>
            <div class="col-md-2">${{ $product->price }}</div>
            <div class="col-md-2">{{ $product->pivot->quantity }}</div>
        </div>
    @endforeach
    <hr>
    <div class="row">
        <div class="col-md-offset-4 col-md-2">Subtotal</div>
        <div class="col-md-2">${{ $order->total_price }}</div>
    </div>
@endsection
