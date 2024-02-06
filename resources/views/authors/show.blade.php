<!-- resources/views/authors/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            Detalhes do Autor
        </div>
        <div class="card-body">
            @if($author)
                <h5 class="card-title">{{ $author['name'] }}</h5>
                <p class="card-text"><strong>Ano de Nascimento:</strong> {{ $author['birth_year'] }}</p>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Voltar</a>
            @else
                <div class="alert alert-warning" role="alert">
                    Autor não encontrado.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
