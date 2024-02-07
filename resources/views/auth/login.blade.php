@extends('layouts.public')

@section('custom-css')

<style>
    body, html {
        height: 100%;
        margin: 0;
    }

    nav.navbar {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-signin {
        max-width: 400px; /* Reduz a largura máxima para uma aparência mais compacta */
        padding: 15px; /* Reduz o espaçamento interno */
        margin: auto; /* Centraliza o formulário na página */
        margin-top: 50px; /* Reduz a margem superior para menos espaço acima do formulário */
        background-color: #f8f9fa;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-label-group {
        margin-bottom: 10px; /* Reduz o espaçamento entre os campos */
    }

    .form-label-group input,
    .form-label-group label {
        padding: .5rem; /* Reduz o espaçamento interno */
    }

    .btn-custom {
        font-weight: 600;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-custom:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .text-sm {
        color: #6c757d;
    }

    .text-sm:hover {
        color: #0056b3;
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
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu a sua senha?') }}
                                </a>
                            @endif

                            <x-primary-button class="btn-custom ms-3">
                                {{ __('Aceder') }}
                            </x-primary-button>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
