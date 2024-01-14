<!-- resources/views/publishers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Editoras</h1>
    <ul>
        @foreach($publishers as $id => $publisher)
            <li><a href="/publishers/{{ $id }}">{{ $publisher['name'] }}</a></li>
        @endforeach
    </ul>
@endsection
