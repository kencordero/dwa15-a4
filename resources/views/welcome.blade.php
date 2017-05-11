@extends('layouts.master')

@section('title')
    Foostore
@endsection

@push('head')
    <link rel="stylesheet" href="/css/welcome.css" >
@endpush

@section('content')
    <h1>Welcome to</h1>
    <div>
        <img id="brand-image" src="/images/fs_400x100.gif" alt="FooStore brand image" >
    </div>
    <h4>The online destination for all* of your shopping needs</h4>
    <sub><i>*three</i></sub>
@endsection
