{{-- resources/views/books/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Editar Livro: {{ $book->title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Título:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
                    <div class="invalid-feedback">
                        Por favor, insira o título do livro.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="author_id" class="form-label">Autor:</label>
                    <select class="form-select" id="author_id" name="author_id" required>
                        <option value="">Selecione um Autor</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione um autor.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="publisher_id" class="form-label">Editora:</label>
                    <select class="form-select" id="publisher_id" name="publisher_id" required>
                        <option value="">Selecione uma Editora</option>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione uma editora.
                    </div>
                </div>

                {{-- Campo de Descrição --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $book->description) }}</textarea>
                    <div class="invalid-feedback">
                        Por favor, insira a descrição do livro.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Preço:</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $book->price) }}" step="0.01" required>
                    <div class="invalid-feedback">
                        Por favor, insira o preço do livro.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cover_image" class="form-label">Imagem de Capa:</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image">
                    @if($book->cover_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $book->cover_image) }}" width="100" alt="Capa atual do livro">
                        </div>
                    @endif
                    <div class="invalid-feedback">
                        Por favor, forneça uma imagem de capa válida.
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Atualizar Livro</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Voltar para a lista de livros</a>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // JavaScript para desativar o envio do formulário se houver campos inválidos.
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endpush
@endsection
