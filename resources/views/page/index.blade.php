@extends('page.layout.layout')

@section('title', $data['name'])

@section('contents')
    
    <h1>{{ $data['name'] }}</h1>

    {!! $data['content'] !!}

@endsection