{{-- resources/views/books/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Livro</h1>

    @if($book)
        <p><strong>Título:</strong> {{ $book->title }}</p>
        <p><strong>Descrição:</strong> {{ $book->description }}</p>
        <p><strong>Autor:</strong> {{ $book->author->name }}</p>
        <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
        <p><strong>Preço:</strong> €{{ number_format($book->price, 2) }}</p>
    @else
        <p>Livro não encontrado.</p>
    @endif

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Voltar para a lista de livros</a>
</div>
@endsection
