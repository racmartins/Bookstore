<!-- resources/views/authors/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Autores</h1>
    <a href="{{ url('/authors/create') }}" class="btn btn-primary mb-3">Adicionar Novo Autor</a>
    <ul class="list-group">
        @foreach($authors as $id => $author)
            <li class="list-group-item">
                <a href="{{ url('/authors/' . $id) }}">{{ $author['name'] }}</a>
                <a href="{{ url('/authors/' . $id . '/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
                <form method="POST" action="{{ url('/authors/' . $id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
