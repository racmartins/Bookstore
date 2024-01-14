@extends('layouts.app')

@section('content')
    <h1>Criar Novo Livro</h1>
    <form method="POST" action="{{ url('/books') }}">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Autor:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="price">Preço:</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Livro</button>
    </form>
@endsection
