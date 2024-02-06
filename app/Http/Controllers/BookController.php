<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Adicionado

class BookController extends Controller
{
    public function index()
    {
        //$books = Book::all();
        $books = Book::paginate(15);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all(); // Buscando todos os autores
        $publishers = Publisher::all(); // Buscando todas as editoras
        return view('books.create', compact('authors', 'publishers'));
    }

    public function store(Request $request)
    {
        //Validação de dados no formulário
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'price' => 'required|numeric',
            // Outras regras de validação para campos adicionais
        ]);

        // Cria um novo livro na base de dados usando os dados validados
        Book::create($validatedData);

        // Redireciona de volta à lista de livros com uma mensagem de sucesso
        return redirect('/books')->with('success', 'Livro adicionado com sucesso.');
    }
    public function show($id)
    {
        // Busca o livro com o ID fornecido, ou lança uma exceção se não o encontrar
        $book = Book::findOrFail($id);

         // Retorna a view 'books.show', passando o livro como uma variável
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        // Busca o livro com o ID fornecido, ou lança uma exceção se não encontrar
        $book = Book::findOrFail($id);

        // Obtém todos os autores disponíveis
        $authors = Author::all();

        // Obtém todas as editoras disponíveis
        $publishers = Publisher::all();

        // Retorna a view 'books.edit', passando o livro, autores e editoras como variáveis
        return view('books.edit', compact('book','authors','publishers'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'price' => 'required|numeric',
            // Outras regras de validação para campos adicionais
        ]);

        Book::whereId($id)->update($validatedData);
        return redirect('/books')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/books')->with('success', 'Livro removido com sucesso.');
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
