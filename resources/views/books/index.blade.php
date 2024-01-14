<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Livros</h1>
    <ul>
        @foreach($books as $id => $book)
            <li><a href="/books/{{ $id }}">{{ $book['title'] }}</a></li>
        @endforeach
    </ul>
@endsection
