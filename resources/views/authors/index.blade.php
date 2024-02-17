{{-- resources/views/authors/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1>Autores</h1>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (Auth::user()->role == 'admin')
        <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">Adicionar Novo Autor</a>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($authors as $author)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $author->name }}</h5>
                        <div class="btn-group" role="group" aria-label="Author Actions">
                            <!-- Botão para visualizar detalhes do autor -->
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-primary btn-sm">Ver Detalhes</a>
                            
                            <!-- Botão para abrir o modal - Bootstrap 5 -->
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $author->id }}">Ver Livros</button>

                            @if (Auth::user()->role == 'admin')
                                <!-- Botão para editar -->
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                                
                                <!-- Botão para remover com mensagem de confirmação -->
                                <form method="POST" action="{{ route('authors.destroy', $author->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja remover este autor? Existem livros relacionados que ficarão sem autor.')">Remover</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal - Bootstrap 5 -->
            @include('authors.modal', ['author' => $author])
            <!-- Fim do Modal -->
        @endforeach
    </div>

    <div class="mt-3">
        {{ $authors->links() }}
    </div>
</div>
@endsection


