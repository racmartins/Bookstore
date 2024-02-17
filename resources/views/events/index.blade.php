@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Eventos</h2>
    <a href="{{ route('events.create') }}" class="btn btn-success mb-3">Adicionar Novo Evento</a>
    @if($events->count() > 0)
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                            <small class="text-muted">Data do Evento: {{ $event->start_time->format('d/m/Y H:i') }}</small>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-secondary btn-sm">Ver Evento</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Não há eventos registados.</p>
    @endif
    {{ $events->links() }}
</div>
@endsection
