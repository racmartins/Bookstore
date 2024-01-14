<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    private $publishers;

    public function __construct()
    {
        // Inicializa os dados de exemplo
        $this->publishers = [
            1 => ['name' => 'Editora 1', 'foundation_year' => 1975],
            2 => ['name' => 'Editora 2', 'foundation_year' => 1988],
            3 => ['name' => 'Editora 3', 'foundation_year' => 1995],
            4 => ['name' => 'Editora 4', 'foundation_year' => 2000],
            5 => ['name' => 'Editora 5', 'foundation_year' => 1982],
            // Adicione mais editoras conforme necessário
        ];
    }

    public function index()
    {
        return view('publishers.index', ['publishers' => $this->publishers]);
    }

    public function show($id)
    {
        $publisher = $this->publishers[$id] ?? null;
        return view('publishers.show', ['publisher' => $publisher]);
    }
}
