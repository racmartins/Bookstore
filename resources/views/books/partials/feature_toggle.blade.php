@if($book->is_featured)
    <form action="{{ route('books.remove-featured', $book->id) }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-warning btn-sm">Remover Destaque</button>
    </form>
@else
    <form action="{{ route('books.mark-featured', $book->id) }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success btn-sm">Destacar</button>
    </form>
@endif
