{{-- resources/views/users/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Utilizadores</h1>
        <a href="{{ route('manage-users.create') }}" class="btn btn-success">Adicionar Novo Utilizador</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('manage-users.show', $user->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                                <a href="{{ route('manage-users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit();">
                                    Remover
                                </button>
                                <form id="delete-user-form-{{ $user->id }}" action="{{ route('manage-users.destroy', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
