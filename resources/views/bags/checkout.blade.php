@extends('layouts.master')

@section('title')
    FooStore: Check out
@endsection

@section('content')
    <form method="post" action="/cart/checkout">
        {{ csrf_field() }}
        <button class="btn btn-primary">Place order</button>
    </form>
@endsection