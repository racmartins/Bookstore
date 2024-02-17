{{-- resources/views/events/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Evento</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('events.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Título do Evento</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Título do Evento" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Descrição" rows="4" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="start_time">Hora de Início</label>
                            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="end_time">Hora de Término</label>
                            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Localização</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Localização" required>
                        </div>
                        <button type="submit" class="btn btn-success">Criar Evento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
