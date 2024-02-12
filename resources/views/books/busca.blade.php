{{-- resources/views/livros/busca.blade.php --}}

@extends('layouts.app')

@section('title', 'Busca de Livros')

@section('content')
<div class="container mt-4">
    <h1>Busca de Livros</h1>

    {{-- Formulário de Busca --}}
    <form action="{{ route('livros.busca') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="titulo" class="form-control" placeholder="Título do Livro" value="{{ request('titulo') }}">
            </div>
            <div class="col-md-3">
                <select name="autor_id" class="form-select">
                    <option value="">Selecione o Autor</option>
                    {{-- Assumindo que você está passando uma coleção de autores `$autores` para a view --}}
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" {{ request('autor_id') == $autor->id ? 'selected' : '' }}>{{ $autor->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="editora_id" class="form-select">
                    <option value="">Selecione a Editora</option>
                    {{-- Assumindo que você está passando uma coleção de editoras `$editoras` para a view --}}
                    @foreach($editoras as $editora)
                        <option value="{{ $editora->id }}" {{ request('editora_id') == $editora->id ? 'selected' : '' }}>{{ $editora->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" name="avaliacao_min" class="form-control" placeholder="Avaliação mínima" value="{{ request('avaliacao_min') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    {{-- Resultados da Busca --}}
    @if($livros->count() > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($livros as $livro)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $livro->cover_image }}" class="card-img-top" alt="Capa do livro: {{ $livro->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $livro->titulo }}</h5>
                            <p class="card-text">{{ $livro->descricao }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-info">Ver Mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $livros->withQueryString()->links() }}
        </div>
    @else
        <p>Nenhum livro encontrado.</p>
    @endif
</div>
@endsection
