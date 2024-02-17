@extends('layouts.public')

@section('custom-css')

<style>
    body, html {
        height: 100%;
        margin: 0;
        background-color: #e9ecef; /* Altera a cor de fundo da página */
    }

    nav.navbar {
        background-color: #007bff; /* Cor primária mais vibrante */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-signin {
        max-width: 400px;
        padding: 25px; /* Aumenta o espaçamento interno para mais conforto */
        margin: 100px auto; /* Aumenta a margem superior para centralizar verticalmente */
        background-color: #fff;
        border-radius: 1rem; /* Bordas mais arredondadas */
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2); /* Sombra mais profunda para efeito 3D */
    }

    .form-label-group {
        position: relative;
        margin-bottom: 20px; /* Aumenta o espaçamento entre os campos */
    }

    .form-label-group > label,
    .form-label-group > .form-control {
        text-align: left; /* Alinha o texto à esquerda */
    }

    .form-label-group input,
    .form-label-group label {
        height: 50px; /* Aumenta a altura para melhor acessibilidade */
        border-radius: .5rem; /* Bordas arredondadas */
    }

    .btn-aceder {
        font-size: 18px; /* Tamanho de fonte maior */
        font-weight: bold;
        color: #fff;
        background-color: #28a745; /* verde Bootstrap */
        border-color: #28a745; /* Cor da borda */
        padding: .75rem 1.5rem; /* Espaçamento interno maior */
        border-radius: .5rem; /* Bordas arredondadas */
        width: 100%; /* Faz o botão ocupar a largura total */
    }

    .btn-aceder:hover {
        background-color: #218838; /* Verde um pouco mais escuro para o hover */
        border-color: #1e7e34; /* Cor da borda para o hover */
    }

    .text-sm {
        display: block; /* Faz o texto ocupar a própria linha */
        margin-top: .5rem; /* Espaçamento superior */
        color: #6c757d;
        text-align: right; /* Alinha o texto à direita */
    }

    .text-sm:hover {
        color: #0056b3;
    }

    /* Estilo para a caixa de "Lembrar de mim" */
    .form-check {
        margin-top: -1rem; /* Ajusta o espaçamento para cima */
    }

    .form-check-label {
        margin-left: .5rem;
    }

    .form-check-input {
        accent-color: #007bff; /* Cor do checkbox */
    }
</style>

@endsection


@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="form-signin authentication-card">
                
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-label-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-label-group">
                            <x-input-label for="password" :value="__('Senha')" />
                            <x-text-input id="password" class="form-control"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="form-check">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label ms-2">{{ __('Lembrar de mim') }}</label>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu a sua senha?') }}
                                </a>
                            @endif

                            <x-primary-button class="btn-aceder ms-3">
                                {{ __('Aceder') }}
                            </x-primary-button>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
