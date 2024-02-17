@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Criar Novo Autor</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('authors.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="birth_year" class="form-label">Ano de Nascimento:</label>
                            <input type="number" class="form-control" id="birth_year" name="birth_year" required>
                        </div>
                        <button type="submit" class="btn btn-success">Criar Autor</button>
                        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

