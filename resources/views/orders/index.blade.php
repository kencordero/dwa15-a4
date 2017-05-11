@extends('layouts.master')

@section('title')
    Foostore: Orders
@endsection

@section('content')
    @if($orders->count() > 0)
        @foreach ($orders as $order)
            <div class="row">
            <div class="col-md-offset-3 col-md-3">
                {{-- for Date formatting - http://php.net/manual/en/function.date.php --}}
                Order placed: {{ date('F jS, Y', strtotime($order->created_at)) }}
            </div>
            <div class="col-md-2">
                Total: ${{ $order->total_price }}
            </div>
            <div class="col-md-3">
                <a href="/orders/{{ $order->id }}">Order Details</a>
            </div>
            </div>
            <br>
        @endforeach
    @else
        <div><i>Looks like you have yet to place any orders. Buy something, why don't you?</i></div>
    @endif
@endsection
