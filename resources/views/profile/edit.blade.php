{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <h2>Editar Perfil</h2>
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
