{{-- resources/views/contact/create.blade.php --}}

@extends('layouts.public')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Formulário de Contacto</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Seu nome completo" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="seuemail@exemplo.com" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="3">{{ old('message', $mensagemPredefinida) }}</textarea>

        </div>

        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
    </form>
</div>
@endsection
