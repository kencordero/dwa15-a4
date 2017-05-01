@extends('layouts.master')

@section('title')
    Foostore: Product listing
@endsection

@section('content')
    @foreach ($products as $product)
        <a href="/products/{{ $product->id }}"><img src="/images/{{ $product->image_file }}"></a>
    @endforeach
@endsection
