@extends('layouts.public')

@section('title', 'Resetar Senha')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Esqueceu a sua senha?') }}</div>
            <div class="card-body">
                <p class="text-muted">
                    {{ __('Esqueceu a sua senha? Sem problema. Apenas nos dê a conhecer o seu endereço de email e faremos um email com o link de reset que lhe permitirá escolher uma nova senha.') }}
                </p>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="text-danger" />
                    </div>
                    <div class="d-grid">
                        <x-primary-button class="btn btn-success">
                            {{ __('Link de Reset da Senha') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
