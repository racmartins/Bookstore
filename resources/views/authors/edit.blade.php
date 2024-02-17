{{{-- resources/views/authors/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Editar Autor</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('authors.update', $author->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome do Autor:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="birth_year" class="form-label">Ano de Nascimento:</label>
                            <input type="number" class="form-control" id="birth_year" name="birth_year" value="{{ old('birth_year', $author->birth_year) }}">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Atualizar Autor</button>
                            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
