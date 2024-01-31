{{-- resources/views/profile/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Perfil do Utilizador</h2>

    <p><strong>Nome:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    @if ($user->profile_photo)
        <p><strong>Foto do Perfil:</strong></p>
        <img src="{{ asset($user->profile_photo) }}" alt="Foto do Perfil" width="150">
    @endif

    <!-- Adicione mais detalhes do perfil conforme necessário -->
</div>
@endsection

