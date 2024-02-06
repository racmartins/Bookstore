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
