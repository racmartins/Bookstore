@extends('layouts.public')

@section('content')
<div class="container my-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header">
            <h2 class="mb-0">Inscrição no Evento: {{ $event->title }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('events.subscribe', $event->id) }}" method="POST">
                @csrf
                @guest
                    <!-- Campos do formulário para inscrição de visitantes -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu email" required>
                    </div>
                @endguest
                <!-- Adicione outros campos conforme necessário -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{ Auth::check() ? 'Confirmar Inscrição' : 'Inscrever-se' }}</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancelar</a>
            <a href="{{ route('eventos') }}" class="btn btn-outline-primary">Voltar aos Eventos</a>
        </div>
    </div>

</div>
@endsection
