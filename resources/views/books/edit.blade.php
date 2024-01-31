{{-- resources/views/books/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Livro: {{ $book->title }}</h1>

    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="form-group">
            <label for="author_id">Autor:</label>
            <select class="form-control" id="author_id" name="author_id">
                <!-- Suponha que $authors é uma coleção de autores -->
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="publisher_id">Editora:</label>
            <select class="form-control" id="publisher_id" name="publisher_id">
                <!-- Suponha que $publishers é uma coleção de editoras -->
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Preço:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $book->price) }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Livro</button>
    </form>
</div>
@endsection
