{{-- resources/views/books/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <style>
        .pagination {
            font-size: 0.9em; /* Ajuste o tamanho da fonte conforme necessário */
        }
        /* Estilos adicionais aqui se necessário */
    </style>

    <h1>Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Adicionar Novo Livro</a>
    <ul class="list-group">
        @foreach($books as $book)
            <li class="list-group-item">
                {{ $book->title }} - {{ $book->author->name }} - {{ $book->publisher->name }}
                <div class="float-right">
                    <a href="{{ route('books.show', $book) }}" class="btn btn-secondary btn-sm">Ver</a>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary btn-sm">Editar</a>
                    <form method="POST" action="{{ route('books.destroy', $book) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        {{ $books->links() }}
    </div>
@endsection

