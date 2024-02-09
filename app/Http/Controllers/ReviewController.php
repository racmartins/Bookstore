<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; // Importar o Auth facade
use App\Models\Book;
use App\Models\Review;

class ReviewController extends Controller
{

    
    public function index(Book $book)
    {
        // A sua lógica para buscar as avaliações do livro
        $reviews = $book->reviews()->latest()->get();
        return view('books.reviews.index', compact('book', 'reviews'));
    }

    public function create(Book $book)
    {
        return view('reviews.create', compact('book'));
    }

    public function store(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);
        $user = Auth::user();
    
        // Verifica se o utilizador já avaliou o livro
        $existingReview = $book->reviews()->where('user_id', $user->id)->first();
        if ($existingReview) {
            return back()->with('error', 'Você já avaliou este livro.');
        }
    
        // Validação da entrada
        $validatedData = $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'nullable|string|max:255', // Limite de caracteres para uma linha
        ]);
    
        // Cria a avaliação
        $review = new Review();
        $review->book_id = $book->id;
        $review->user_id = $user->id;
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];
        $review->save();
    
       
        // Redireciona para a página de detalhes do livro com uma mensagem de sucesso
        return redirect()->route('books.index', $bookId)->with('success', 'Avaliação enviada com sucesso.');
    }
    
}
