@extends('layouts.app')

@section('content')
    <h1>Editar Editora</h1>
    <form method="POST" action="/publishers/{{ $id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $publisher['name'] }}" required>
        </div>
        <div class="form-group">
            <label for="foundation_year">Ano de Fundação:</label>
            <input type="number" class="form-control" id="foundation_year" name="foundation_year" value="{{ $publisher['foundation_year'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Editora</button>
    </form>
@endsection