{{-- resources/views/books/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Adicionar Novo Livro</a>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($books as $book)
            <div class="col">
                <div class="card h-100 shadow-sm {{ $book->is_featured ? 'border-warning' : '' }}">
                    @if($book->cover_image)
                        {{-- Certifique-se de que o caminho da imagem está correto e acessível --}}
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="Capa do livro: {{ $book->title }}">
                    @else
                    <img src="{{ $book->cover_image }}" class="card-img-top" alt="Capa Padrão">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-outline-primary btn-sm ms-2">Editar</a>
                        <form method="POST" action="{{ route('books.destroy', $book) }}" class="d-inline ms-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover este livro?')">Remover</button>
                        </form>
                        @if(!$book->is_featured)
                                <form action="{{ route('books.mark-featured', $book) }}" method="POST" class="d-inline ms-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Destacar</button>
                                </form>
                            @else
                                <form action="{{ route('books.remove-featured', $book) }}" method="POST" class="d-inline ms-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning btn-sm">Retirar</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
@endsection