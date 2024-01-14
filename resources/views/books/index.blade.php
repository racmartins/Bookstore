<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Livros</h1>
    <a href="{{ url('/books/create') }}" class="btn btn-primary mb-3">Adicionar Novo Livro</a>
    <ul class="list-group">
        @foreach($books as $id => $book)
            <li class="list-group-item">
                <a href="{{ url('/books/'.$id) }}">{{ $book['title'] }}</a>
                <a href="{{ url('/books/'.$id.'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
                
                <!-- Formulário de remoção -->
                <form method="POST" action="{{ url('/books/'.$id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
