@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Avaliar Livro: {{ $book->title }}</h2>
    <form action="{{ route('reviews.store', $book->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Avaliação</label>
            <select name="rating" id="rating" class="form-control">
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="review" class="form-label">Comentário (Opcional)</label>
            <input type="text" name="review" id="review" class="form-control" maxlength="255">
        </div>
        <button type="submit" class="btn btn-primary">Enviar Avaliação</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>
@endsection
