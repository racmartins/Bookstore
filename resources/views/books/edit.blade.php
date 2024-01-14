@extends('layouts.app')

@section('content')
    <h1>Editar Livro</h1>
    <form method="POST" action="{{ url('/books/' . $id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book['title'] }}" required>
        </div>
        <div class="form-group">
            <label for="author">Autor:</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book['author'] }}" required>
        </div>
        <div class="form-group">
            <label for="price">Preço:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $book['price'] }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Livro</button>
    </form>
@endsection
