<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authorsFile;

    public function __construct()
    {
        $this->authorsFile = storage_path('app/authors.json');
        if (!file_exists($this->authorsFile)) {
            file_put_contents($this->authorsFile, json_encode([]));
        }
    }

    private function getAuthors()
    {
        return json_decode(file_get_contents($this->authorsFile), true);
    }

    private function saveAuthors($authors)
    {
        file_put_contents($this->authorsFile, json_encode($authors, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        $authors = $this->getAuthors();
        return view('authors.index', ['authors' => $authors]);
    }

    public function show($id)
    {
        $authors = $this->getAuthors();
        $author = $authors[$id] ?? null;
        return view('authors.show', ['author' => $author]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $authors = $this->getAuthors();
        $newId = count($authors) > 0 ? max(array_keys($authors)) + 1 : 1;
        $authors[$newId] = $request->all();
        $this->saveAuthors($authors);

        return redirect('/authors');
    }

    public function edit($id)
    {
        $authors = $this->getAuthors();
        $author = $authors[$id] ?? null;
        return view('authors.edit', ['author' => $author, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $authors = $this->getAuthors();
        if (isset($authors[$id])) {
            $authors[$id] = $request->all();
            $this->saveAuthors($authors);
        }

        return redirect('/authors');
    }

    public function destroy($id)
    {
        $authors = $this->getAuthors();
        if (isset($authors[$id])) {
            unset($authors[$id]);
            $this->saveAuthors($authors);
        }

        return redirect('/authors');
    }
}