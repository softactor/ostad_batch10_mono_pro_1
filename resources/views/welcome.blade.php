@extends('front.layout.app')
@section('title', 'Home')


@section('content')
    <h1>{{ $heading }}</h1>

    <div style="border: 1px solid black; margin: 5px; padding: 5px;">

        {!! $withHtml !!}

    </div>
@endsection