<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    private $publishersFile;

    public function __construct()
    {
        $this->publishersFile = storage_path('app/publishers.json');
        if (!file_exists($this->publishersFile)) {
            file_put_contents($this->publishersFile, json_encode([]));
        }
    }

    private function getPublishers()
    {
        return json_decode(file_get_contents($this->publishersFile), true);
    }

    private function savePublishers($publishers)
    {
        file_put_contents($this->publishersFile, json_encode($publishers, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        $publishers = $this->getPublishers();
        return view('publishers.index', ['publishers' => $publishers]);
    }

    public function show($id)
    {
        $publishers = $this->getPublishers();
        $publisher = $publishers[$id] ?? null;
        return view('publishers.show', ['publisher' => $publisher]);
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $publishers = $this->getPublishers();
        $newId = count($publishers) > 0 ? max(array_keys($publishers)) + 1 : 1;
        $publishers[$newId] = $request->all();
        $this->savePublishers($publishers);

        return redirect('/publishers');
    }

    public function edit($id)
    {
        $publishers = $this->getPublishers();
        $publisher = $publishers[$id] ?? null;
        return view('publishers.edit', ['publisher' => $publisher, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $publishers = $this->getPublishers();
        if (isset($publishers[$id])) {
            $publishers[$id] = $request->all();
            $this->savePublishers($publishers);
        }

        return redirect('/publishers');
    }

    public function destroy($id)
    {
        $publishers = $this->getPublishers();
        if (isset($publishers[$id])) {
            unset($publishers[$id]);
            $this->savePublishers($publishers);
        }

        return redirect('/publishers');
    }
}