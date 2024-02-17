@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Mensagem de feedback --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $event->title }}</h2>
        </div>
        <div class="card-body">
            <p>{{ $event->description }}</p>
            <p>Data e Hora de Início: {{ $event->start_time ? $event->start_time->format('d/m/Y H:i') : 'N/A' }}</p>
            <p>Data e Hora de Término: {{ $event->end_time ? $event->end_time->format('d/m/Y H:i') : 'N/A' }}</p>
            <p>Localização: {{ $event->location }}</p>
        </div>
    </div>
    {{-- Lista de inscritos --}}
    <h3>Inscritos</h3>
    <ul class="list-group mb-4">
        {{-- Primeiro, exiba o criador do evento --}}
        @if($event->user)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $event->user->name }} - Criador do Evento
            <span class="badge bg-primary rounded-pill">Criador</span>
        </li>
        @endif

        {{-- Agora, exiba os outros inscritos --}}
        @forelse($event->subscribers as $subscriber)
            @if($subscriber->id !== $event->user_id) {{-- Evita listar o criador do evento --}}
            <li class="list-group-item">
                {{ $subscriber->name }} - inscrito em {{ $subscriber->pivot->created_at->format('d/m/Y H:i') }}
            </li>
            @endif
        @empty
            <li class="list-group-item">Nenhum inscrito.</li>
        @endforelse

        {{-- Lista de Convidados Não Autenticados --}}
        @forelse($event->guestSubscriptions as $guestSubscription)
        <li class="list-group-item list-group-item-warning">
            {{ $guestSubscription->email }} (Convidado) - inscrito em {{ $guestSubscription->created_at->format('d/m/Y H:i') }}
        </li>
        @empty
            <li class="list-group-item">Nenhum convidado inscrito.</li>
        @endforelse
    </ul>
    @if (Auth::check())
        @can('update', $event)
            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Editar</a>
        @endcan
        @can('delete', $event)
            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        @endcan
    @endif
    @if(Auth::check() && !$event->subscribers->contains(Auth::user()))
        @if(Auth::id() !== $event->user_id)
            <form action="{{ route('events.subscribe', $event) }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-success">Inscrever-se no Evento</button>
            </form>
        @endif
    @endif

</div>
@endsection
