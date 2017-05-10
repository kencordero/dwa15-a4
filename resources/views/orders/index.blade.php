@extends('layouts.master')

@section('title')
    Foostore: Orders
@endsection

@section('content')
    @if($orders->count() > 0)
        @foreach ($orders as $order)
            <a href="/orders/{{ $order->id }}">{{ $order->created_at }} ${{ $order->total_price }}</a>
            <br>
        @endforeach
    @else
        <div><i>Looks like you have yet to place any orders. Buy something, why don't you?</i></div>
    @endif
@endsection
