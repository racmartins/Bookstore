{{-- resources/views/books/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Novo Livro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Autor</label>
            <select class="form-control" id="author_id" name="author_id" required>
                <option value="">Selecione um Autor</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="publisher_id" class="form-label">Editora</label>
            <select class="form-control" id="publisher_id" name="publisher_id" required>
                <option value="">Selecione uma Editora</option>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Livro</button>
    </form>
</div>
@endsection


