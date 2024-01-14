<!-- resources/views/authors/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Autores</h1>
    <ul>
        @foreach($authors as $id => $author)
            <li><a href="/authors/{{ $id }}">{{ $author['name'] }}</a></li>
        @endforeach
    </ul>
@endsection
