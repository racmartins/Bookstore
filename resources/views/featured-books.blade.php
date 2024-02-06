@extends('layouts.public')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Livros em Destaque</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach($featuredBooks as $book)
            <div class="col">
                <div class="card h-100 shadow-sm"> <!-- Adiciona sombra para um efeito visual melhor -->
                    <img src="{{ $book->cover_image }}" class="card-img-top" alt="Capa do livro" style="object-fit: cover; height: 250px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

