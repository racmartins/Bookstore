{{-- resources/views/publishers/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <style>
        .pagination {
            font-size: 0.9em; /* Ajuste o tamanho da fonte conforme necessário */
        }
        /* Estilos adicionais aqui se necessário */
    </style>

    <h1>Editoras</h1>
    <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Adicionar Nova Editora</a>
    <ul class="list-group">
        @foreach($publishers as $publisher)
            <li class="list-group-item">
                {{ $publisher->name }}
                <div class="float-right">
                    <a href="{{ route('publishers.show', $publisher) }}" class="btn btn-secondary btn-sm">Ver</a>
                    <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-secondary btn-sm">Editar</a>
                    <form method="POST" action="{{ route('publishers.destroy', $publisher) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        {{ $publishers->links() }}
    </div>
@endsection


