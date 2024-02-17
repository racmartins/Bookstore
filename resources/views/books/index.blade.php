{{-- resources/views/books/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Livros</h1>
    @if (Auth::user() && Auth::user()->role == 'admin')
        <a href="{{ route('books.create') }}" class="btn btn-success mb-4">Adicionar Novo Livro</a>
    @endif

    {{-- Formulário de Busca --}}
    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Buscar por título, autor, editora..." aria-label="Buscar por título, autor, editora..." aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($books as $book)
            <div class="col">
                <div class="card h-100 shadow {{ $book->is_featured ? 'border-warning' : '' }}">
                    <!-- Imagem do livro -->
                    <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : asset('path/to/default-image.jpg') }}" class="card-img-top" alt="Capa do livro: {{ $book->title }}" style="height: 200px; object-fit: cover;">
                    
                    <!-- Corpo do card com descrição e título -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description ? Str::limit($book->description, 100) : 'Sem descrição disponível.' }}</p>
                    </div>

                    <!-- Avaliação em Destaque -->
                    @if($book->reviews->isNotEmpty())
                        @include('books.partials.review_highlight', ['book' => $book])
                    @endif

                    <!-- Rodapé do card com ações -->
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm">Ver</a>

                        @if (Auth::check() && Auth::user()->role != 'admin')
                            <a href="{{ route('reviews.create', $book->id) }}" class="btn btn-success btn-sm">Avaliar Livro</a>
                        @endif

                        @if (Auth::user() && Auth::user()->role == 'admin')
                            <div class="btn-group">
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover este livro?')">Remover</button>
                                </form>
                                @include('books.partials.feature_toggle', ['book' => $book])
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>

@endsection
