<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    private $publishers;

    public function __construct()
    {
        if (!session()->has('publishers')) {
            session(['publishers' => [
                1 => ['name' => 'Editora 1', 'foundation_year' => 1975],
                2 => ['name' => 'Editora 2', 'foundation_year' => 1988],
                3 => ['name' => 'Editora 3', 'foundation_year' => 1995],
                4 => ['name' => 'Editora 4', 'foundation_year' => 2000],
                5 => ['name' => 'Editora 5', 'foundation_year' => 1982],
                // Adicione mais editoras conforme necessário
            ]]);
        }
    }

    public function index()
    {
        $publishers = session('publishers');
        return view('publishers.index', ['publishers' => $publishers]);
    }

    public function show($id)
    {
        $publishers = session('publishers');
        $publisher = $publishers[$id] ?? null;
        return view('publishers.show', ['publisher' => $publisher]);
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $publishers = session('publishers', []);
        $newId = count($publishers) > 0 ? max(array_keys($publishers)) + 1 : 1;
        $publishers[$newId] = $request->all();
        session(['publishers' => $publishers]);

        return redirect('/publishers');
    }

    public function edit($id)
    {
        $publishers = session('publishers');
        $publisher = $publishers[$id] ?? null;
        return view('publishers.edit', ['publisher' => $publisher, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $publishers = session('publishers', []);
        if (isset($publishers[$id])) {
            $publishers[$id] = $request->all();
            session(['publishers' => $publishers]);
        }

        return redirect('/publishers');
    }

    public function destroy($id)
    {
        $publishers = session('publishers', []);
        if (isset($publishers[$id])) {
            unset($publishers[$id]);
            session(['publishers' => $publishers]);
        }

        return redirect('/publishers');
    }
}
