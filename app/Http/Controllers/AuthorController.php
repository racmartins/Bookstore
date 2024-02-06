<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Importar o Auth facade
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Exibe uma lista de autores
    public function index()
    {
        //$authors = Author::all();

        // Carregando os livros relacionados para cada autor e paginando os resultados
        $authors = Author::with('books')->paginate(15);

        return view('authors.index', compact('authors'));
    }

    // Mostra o formulário para criar um novo autor
    public function create()
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->route('authors.index')->with('error', 'Acesso negado.');
        }
        return view('authors.create');
    }

    // Armazena um autor recém-criado na base de dados
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'birth_date' => 'sometimes|min:10', // O 'sometimes' é para permitir mas não requerer o campo
            // Outros campos, como 'bio', podem ser incluídos aqui
        ]);

        $author = Author::create($validatedData);
        return redirect()->route('authors.index')->with('success', 'Autor criado com sucesso!');
    }

    // Exibe um autor específico
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    // Mostra o formulário para editar um autor existente
    public function edit(Author $author)
    {
        if (Auth::user()->role != 'admin') {
            return redirect()->route('authors.index')->with('error', 'Acesso negado.');
        }
        return view('authors.edit', compact('author'));
    }

    // Atualiza um autor na base de dados
    public function update(Request $request, Author $author)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'birth_date' => 'sometimes|min:10', // O 'sometimes' é para permitir mas não requerer o campo
            // Outros campos, como 'bio', podem ser incluídos aqui
        ]);

        $author->update($validatedData);
        return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso!');
    }

    // Remove um autor da base de dados
    public function destroy($id)
    {
        $author = Author::find($id);

        if (Auth::user()->role != 'admin') {
            return redirect()->route('authors.index')->with('error', 'Acesso negado.');
        }

        // Opção 1: Remover todos os livros relacionados
        // $author->books()->delete();

        // Opção 2: Atualizar os livros relacionados para não ter um autor
        // $author->books()->update(['author_id' => null]);

        // Desassocia os livros do autor
        $author->books()->update(['author_id' => null]);

        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor excluído com sucesso!');
    }


    
    
    

}



