<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importa o Facade Storage para manipulação de arquivos

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['reviews.user', 'author', 'publisher']);

        // Verifica se o parâmetro de busca foi fornecido
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            // Filtra os livros com base no título, autor ou editora
            $query->where('title', 'like', "%{$search}%")
                ->orWhereHas('author', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('publisher', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        $books = $query->paginate(15);

        // Para cada livro, calcula a avaliação média e determina o nome do último avaliador
        $books->each(function ($book) {
            // Calcula a avaliação média
            $book->average_rating = $book->reviews->avg('rating') ?? 'N/A';
        
            // Determina o nome do último utilizador que avaliou, se houver
            $lastReview = $book->reviews->sortByDesc('created_at')->first();
            $book->last_reviewer_name = $lastReview ? $lastReview->user->name : 'N/A';
        });

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('books.create', compact('authors', 'publishers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string', // Adiciona uma validação para o campo de descrição
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'price' => 'required|numeric',
            'is_featured' => 'sometimes|boolean', // Adiciona uma validação para um campo booleano de destaque
            'cover_image' => 'sometimes|file|image|max:5000',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('books.edit', compact('book', 'authors', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string', // Adiciona uma validação para o campo de descrição
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'price' => 'required|numeric',
            'is_featured' => 'sometimes|boolean', // Adiciona uma validação para um campo booleano de destaque
            'cover_image' => 'sometimes|file|image|max:5000',
        ]);

        if ($request->hasFile('cover_image')) {
            // Remove o arquivo antigo se existir
            if ($book->cover_image) {
                Storage::delete('public/' . $book->cover_image);
            }

            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        if ($book->cover_image) {
            Storage::delete('public/' . $book->cover_image);
        }

        $book->delete();
        return back()->with('success', 'Livro removido com sucesso.');
    }
    
    public function markAsFeatured(Book $book)
    {
        $book->is_featured = true;
        $book->save();

        return back()->with('success', 'Livro destacado com sucesso.');
    }
    public function removeFeatured(Book $book)
    {
        $book->is_featured = false;
        $book->save();

        return back()->with('success', 'Destaque do livro removido com sucesso.');
    }

    public function busca(Request $request)
{
    $query = Livro::query();

    if ($request->filled('titulo')) {
        $query->where('titulo', 'like', '%' . $request->titulo . '%');
    }

    if ($request->filled('autor_id')) {
        $query->where('autor_id', $request->autor_id);
    }

    if ($request->filled('editora_id')) {
        $query->where('editora_id', $request->editora_id);
    }

    if ($request->filled('avaliacao_min')) {
        $query->whereHas('avaliacoes', function ($query) use ($request) {
            $query->havingRaw('AVG(avaliacoes.nota) >= ?', [$request->avaliacao_min]);
        });
    }

    $livros = $query->with('autor', 'editora', 'avaliacoes')->paginate(10);

    return view('livros.index', compact('livros'));
}

}
