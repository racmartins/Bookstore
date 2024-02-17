{{-- resources/views/books/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Detalhes do Livro</h4>
        </div>
        <div class="card-body">
            @if($book)
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text"><strong>Descrição:</strong> {{ $book->description }}</p>
                <p class="card-text"><strong>Autor:</strong> {{ $book->author->name }}</p>
                <p class="card-text"><strong>Editora:</strong> {{ $book->publisher->name }}</p>
                <p class="card-text"><strong>Preço:</strong> €{{ number_format($book->price, 2) }}</p>
                <hr>
                <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Voltar para a lista de livros</a>
            @else
                <div class="alert alert-warning" role="alert">
                    Livro não encontrado.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection


