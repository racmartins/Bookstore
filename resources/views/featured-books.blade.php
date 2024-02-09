@extends('layouts.public')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Livros em Destaque</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach($featuredBooks as $book)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-top-container" style="height: 200px; overflow: hidden;">
                        @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Capa do livro: {{ $book->title }}" style="width: 100%; object-fit: cover;">
                        @else
                        <img src="{{ $book->cover_image }}" alt="Capa Padrão" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column"> <!-- E aqui também -->
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text flex-fill">{{ $book->description ?? 'Sem descrição disponível.' }}</p> <!-- flex-fill fará com que o texto ocupe o espaço disponível -->
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary mt-3 align-self-start">Ver mais</a> <!-- mt-3 adiciona um pouco de margem acima do botão -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
