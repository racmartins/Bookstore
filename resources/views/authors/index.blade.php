{{-- resources/views/authors/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Autores</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Adicionar Novo Autor</a>

    <ul class="list-group">
        @foreach($authors as $author)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $author->name }}

                <div>
                    <!-- Botão para abrir o modal - Bootstrap 5 -->
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $author->id }}">Ver Livros</button>

                    <!-- Botão para editar -->
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-secondary btn-sm">Editar</a>

                    <!-- Botão para remover com mensagem de confirmação -->
                    <form method="POST" action="{{ route('authors.destroy', $author->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja remover este autor? Existem livros relacionados que ficarão sem autor.')">Remover</button>
                    </form>

                    <!-- Modal - Bootstrap 5 -->
                    <div class="modal fade" id="modal{{ $author->id }}" tabindex="-1" aria-labelledby="modalTitle{{ $author->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle{{ $author->id }}">Livros de {{ $author->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if($author->books->isNotEmpty())
                                        <ul>
                                            @foreach($author->books as $book)
                                                <li>{{ $book->title }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Nenhum livro relacionado.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim do Modal -->
                </div>
            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        {{ $authors->links() }}
    </div>
</div>
@endsection



