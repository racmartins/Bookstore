{{-- resources/views/publishers/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Editoras</h1>
        <a href="{{ route('publishers.create') }}" class="btn btn-success">Adicionar Nova Editora</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="list-group">
                @foreach($publishers as $publisher)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $publisher->name }}
                        <div>
                            <a href="{{ route('publishers.show', $publisher) }}" class="btn btn-outline-info btn-sm">Ver</a>
                            <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja remover esta editora?')) document.getElementById('delete-form-{{ $publisher->id }}').submit();">
                                Remover
                            </button>
                            <form id="delete-form-{{ $publisher->id }}" action="{{ route('publishers.destroy', $publisher) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </li>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $publishers->links() }}
    </div>
</div>
@endsection



