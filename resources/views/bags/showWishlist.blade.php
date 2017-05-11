@extends('layouts.master')

@section('title')
    Foostore: Wishlist
@endsection

@section('content')
    @if ($products->count() > 0)
        @foreach($products as $product)
            <div class="row">
                <div class="itemtext col-md-offset-3 col-md-2">
                    {{ $product->name }}
                </div>
                <div class="col-md-2">
                    <form method="post" action="/wishlist/cart">
                        {{ csrf_field() }}
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-primary" value="Move to cart">
                    </form>
                </div>
                <div class="col-md-2">
                    <form method="post" action="/wishlist/product">
                        {{ csrf_field() }}
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="submit" class="btn btn-danger" value="Remove from wishlist">
                    </form>
                </div>
            </div>
            <br>
        @endforeach
        <br>
    @else
        <div><i>Looks like your wish list is empty. Why don't you peruse our <a href="/products">wares</a>?</i></div>
    @endif
@endsection
