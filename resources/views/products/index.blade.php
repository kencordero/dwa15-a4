@extends('layouts.master')

@section('title')
    Foostore: Product listing
@endsection

@section('content')
    @foreach ($products as $product)
        <div class="col-xs-4 col-sm-3 col-md-2">
            <a href="/products/{{ $product->id }}"><img src="/images/{{ $product->image_file }}"></a>
        </div>
    @endforeach
@endsection
