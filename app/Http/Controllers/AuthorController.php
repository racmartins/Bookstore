<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authors;

    public function __construct()
    {
        // Inicializa os dados de exemplo
        $this->authors = [
            1 => ['name' => 'Autor 1', 'birth_year' => 1980],
            2 => ['name' => 'Autor 2', 'birth_year' => 1990],
            3 => ['name' => 'Autor 3', 'birth_year' => 1985],
            4 => ['name' => 'Autor 4', 'birth_year' => 1978],
            5 => ['name' => 'Autor 5', 'birth_year' => 1995],
            // Adicione mais autores conforme necessário
        ];
    }

    public function index()
    {
        return view('authors.index', ['authors' => $this->authors]);
    }

    public function show($id)
    {
        $author = $this->authors[$id] ?? null;
        return view('authors.show', ['author' => $author]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $newId = max(array_keys($this->authors)) + 1;
        $this->authors[$newId] = $request->all();
        return redirect('/authors');
    }

    public function edit($id)
    {
        $author = $this->authors[$id] ?? null;
        return view('authors.edit', ['author' => $author, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $this->authors[$id] = $request->all();
        return redirect('/authors');
    }

    public function destroy($id)
    {
        unset($this->authors[$id]);
        return redirect('/authors');
    }
}
