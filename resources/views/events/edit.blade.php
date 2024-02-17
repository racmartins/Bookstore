@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Evento</h2>
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título do Evento</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description" required>{{ $event->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Data e Hora de Início</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">Data e Hora de Término</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Localização</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Alterações</button>
    </form>
</div>
@endsection
