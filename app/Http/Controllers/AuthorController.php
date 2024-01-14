<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authors;

    public function __construct()
    {
        if (!session()->has('authors')) {
            session(['authors' => [
                1 => ['name' => 'Autor 1', 'birth_year' => 1980],
                2 => ['name' => 'Autor 2', 'birth_year' => 1990],
                3 => ['name' => 'Autor 3', 'birth_year' => 1985],
                4 => ['name' => 'Autor 4', 'birth_year' => 1978],
                5 => ['name' => 'Autor 5', 'birth_year' => 1995],
                // Adicione mais autores conforme necessário
            ]]);
        }
    }

    public function index()
    {
        $authors = session('authors');
        return view('authors.index', ['authors' => $authors]);
    }

    public function show($id)
    {
        $authors = session('authors');
        $author = $authors[$id] ?? null;
        return view('authors.show', ['author' => $author]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $authors = session('authors');
        $newId = count($authors) > 0 ? max(array_keys($authors)) + 1 : 1;
        $authors[$newId] = $request->all();
        session(['authors' => $authors]);

        return redirect('/authors');
    }

    public function edit($id)
    {
        $authors = session('authors');
        $author = $authors[$id] ?? null;
        return view('authors.edit', ['author' => $author, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $authors = session('authors');
        $authors[$id] = $request->all();
        session(['authors' => $authors]);

        return redirect('/authors');
    }

    public function destroy($id)
    {
        $authors = session('authors');
        unset($authors[$id]);
        session(['authors' => $authors]);

        return redirect('/authors');
    }
}
