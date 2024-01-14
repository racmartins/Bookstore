@extends('layouts.app')

@section('content')
    <h1>Editar Autor</h1>
    <form method="POST" action="/authors/{{ $id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $author['name'] }}" required>
        </div>
        <div class="form-group">
            <label for="birth_year">Ano de Nascimento:</label>
            <input type="number" class="form-control" id="birth_year" name="birth_year" value="{{ $author['birth_year'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Autor</button>
    </form>
@endsection
