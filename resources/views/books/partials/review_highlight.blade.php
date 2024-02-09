@if($book->reviews->count() > 0)
    <div class="review-highlight mt-3">
        <p class="card-text">Avaliação Média: {{ number_format($book->average_rating, 1) }}</p>
        <p class="card-text">Último Avaliador: {{ $book->last_reviewer_name }}</p>
        {{-- Botão para abrir o modal de avaliações --}}
        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewsModal-{{ $book->id }}">
            Ver Avaliações
        </button>

        {{-- Modal de avaliações --}}
        <div class="modal fade" id="reviewsModal-{{ $book->id }}" tabindex="-1" aria-labelledby="reviewsModalLabel-{{ $book->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewsModalLabel-{{ $book->id }}">Avaliações de "{{ $book->title }}"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach($book->reviews as $review)
                            <div class="review mb-3">
                                <h6>{{ $review->user->name }} - Avaliado em {{ $review->created_at->format('d/m/Y') }}</h6>
                                <p>Nota: {{ $review->rating }}</p>
                                <p>{{ $review->review }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <p class="mb-0">Este livro ainda não foi avaliado.</p>
@endif

