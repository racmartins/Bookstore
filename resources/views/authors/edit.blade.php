{{-- resources/views/authors/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Autor</h1>

    <form method="POST" action="{{ route('authors.update', $author->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome do Autor:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
        </div>

        <div class="form-group">
            <label for="birth_year">Ano de Nascimento:</label>
            <input type="number" class="form-control" id="birth_year" name="birth_year" value="{{ old('birth_year', $author->birth_year) }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Autor</button>
    </form>
</div>
@endsection
