<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importa o Facade Storage para manipulação de arquivos

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'publisher'])->paginate(15); // Carrega os livros com seus autores e editoras relacionados
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
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'price' => 'required|numeric',
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
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'price' => 'required|numeric',
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
}
