{{-- resources/views/books/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Adicionar Novo Livro</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Há alguns problemas com os campos:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf

                <!-- Título -->
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <div class="invalid-feedback">
                        Por favor, insira o título do livro.
                    </div>
                </div>
                <!-- Autor -->
                <div class="mb-3">
                    <label for="author_id" class="form-label">Autor</label>
                    <select class="form-select" id="author_id" name="author_id" required>
                        <option value="">Selecione um Autor</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione um autor.
                    </div>
                </div>
                <!-- Editora -->
                <div class="mb-3">
                    <label for="publisher_id" class="form-label">Editora</label>
                    <select class="form-select" id="publisher_id" name="publisher_id" required>
                        <option value="">Selecione uma Editora</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione uma editora.
                    </div>
                </div>
                <!-- Descrição -->
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    <div class="invalid-feedback">
                        Por favor, insira a descrição do livro.
                    </div>
                </div>
                <!-- Preço -->
                <div class="mb-3">
                    <label for="price" class="form-label">Preço</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    <div class="invalid-feedback">
                        Por favor, insira o preço do livro.
                    </div>
                </div>
                <!-- Imagem de capa -->
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Imagem de Capa</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image" required>
                    <div class="invalid-feedback">
                        Por favor, faça o upload da imagem de capa do livro.
                    </div>
                </div>
                <!-- Botão de submissão -->
                <button type="submit" class="btn btn-success">Adicionar Livro</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Exemplo de JavaScript para desativar o envio de formulários se houver campos inválidos
        (function () {
            'use strict'
            // ... código JavaScript para validação ...
        })();
    </script>
@endpush
@endsection
