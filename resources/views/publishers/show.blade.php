<!-- resources/views/publishers/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Detalhes da Editora</div>
                <div class="card-body">
                    @if($publisher)
                        <h5 class="card-title">{{ $publisher->name }}</h5>
                        <p class="card-text"><strong>Ano de Fundação:</strong> {{ $publisher->foundation_year }}</p>
                        <div class="mt-4">
                            <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
                            <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    @else
                        <p class="text-center">Editora não encontrada.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

