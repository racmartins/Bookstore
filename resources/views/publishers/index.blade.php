<!-- resources/views/publishers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editoras</h1>
    <a href="{{ url('/publishers/create') }}" class="btn btn-primary mb-3">Adicionar Nova Editora</a>
    <ul class="list-group">
        @foreach($publishers as $id => $publisher)
            <li class="list-group-item">
                <a href="{{ url('/publishers/' . $id) }}">{{ $publisher['name'] }}</a>
                <a href="{{ url('/publishers/' . $id . '/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
                <form method="POST" action="{{ url('/publishers/' . $id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

