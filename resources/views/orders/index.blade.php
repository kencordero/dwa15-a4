@extends('layouts.master')

@section('title')
    Foostore: Orders
@endsection

@section('content')
    @foreach ($orders as $order)
        <a href="/orders/{{ $order->id }}">{{ $order->created_at }}</a>
    @endforeach
@endsection
