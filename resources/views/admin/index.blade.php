@extends('admin.layout.admin')

@section('content')
    <h1>Content</h1>    
    <hr>

    <h2>Pages</h2>
    <ul>
        @foreach ($pages as $page)
            <li>Page: {{ $page->name }} -> <a href="{{ $page->slug }}" target="_blank">Open</a></li>
        @endforeach
    </ul>
@endsection