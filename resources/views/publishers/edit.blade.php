{{-- resources/views/publishers/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Editar Editora
                </div>
                <div class="card-body">
                    <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $publisher->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="foundation_year" class="form-label">Ano de Fundação</label>
                            <input type="number" class="form-control" id="foundation_year" name="foundation_year" value="{{ $publisher->foundation_year }}">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success me-md-2">Guardar Alterações</button>
                            <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

