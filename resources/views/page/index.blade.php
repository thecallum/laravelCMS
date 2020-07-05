@extends('page.layout.layout')

@section('contents')
    
<h1>{{ $data['name'] }}</h1>


{!! $data['contents'] !!}



@endsection