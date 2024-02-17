@extends('layouts.public')

@section('title', 'Eventos do Sistema')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Eventos do Sistema</h2>
    @forelse($systemEvents as $event)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h3 class="card-title">{{ $event->title }}</h3>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text">
                    <small class="text-muted">Data e Hora: {{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('d/m/Y H:i') }}</small>
                </p>
                <p class="card-text">
                    <small class="text-muted">Localização: {{ $event->location }}</small>
                </p>
                <!-- Formulário de inscrição -->
                <a href="{{ route('inscription', $event->id) }}" class="btn btn-primary">Inscrever-se</a>
            </div>
        </div>
    @empty
        <p>Nenhum evento do sistema encontrado.</p>
    @endforelse
</div>
@endsection

