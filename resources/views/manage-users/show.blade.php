{{-- resources/views/users/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Detalhes do Utilizador</div>
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ $user->name }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('manage-users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('manage-users.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

