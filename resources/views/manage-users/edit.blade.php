{{-- resources/views/manage-users/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Editar Utilizador</div>
                <div class="card-body">
                    <form action="{{ route('manage-users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        {{-- Aqui pode adicionar campos adicionais conforme necessário --}}
                <!-- Campo para editar a senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">Nova Senha:</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-muted">Deixe em branco para não alterar a senha.</small>
                </div>


                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{ route('manage-users.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

