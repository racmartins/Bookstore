{{-- resources/views/books/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
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

            {{-- Atenção: Formulário atualizado para suportar upload de arquivos --}}
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <div class="invalid-feedback">
                        Por favor, insira o título do livro.
                    </div>
                </div>

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

                <div class="mb-3">
                    <label for="price" class="form-label">Preço</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    <div class="invalid-feedback">
                        Por favor, insira o preço do livro.
                    </div>
                </div>

                {{-- Campo adicional para imagem de capa --}}
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Imagem de Capa</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image">
                    <div class="invalid-feedback">
                        Por favor, forneça uma imagem de capa válida.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Adicionar Livro</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // JavaScript para desativar o envio do formulário se houver campos inválidos
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
