<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes do Livro</h1>

    @if($book)
        <p><strong>Título:</strong> {{ $book['title'] }}</p>
        <p><strong>Autor:</strong> {{ $book['author'] }}</p>
        <p><strong>Preço:</strong> ${{ $book['price'] }}</p>
    @else
        <p>Livro não encontrado.</p>
    @endif
@endsection
