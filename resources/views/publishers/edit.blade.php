{{-- resources/views/publishers/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Editora</h1>

    <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $publisher->name }}" required>
        </div>

        <div class="mb-3">
            <label for="foundation_year" class="form-label">Ano de Fundação</label>
            <input type="number" class="form-control" id="foundation_year" name="foundation_year" value="{{ $publisher->foundation_year }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
