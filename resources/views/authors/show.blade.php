<!-- resources/views/authors/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes do Autor</h1>

    @if($author)
        <p><strong>Nome:</strong> {{ $author['name'] }}</p>
        <p><strong>Ano de Nascimento:</strong> {{ $author['birth_year'] }}</p>
    @else
        <p>Autor não encontrado.</p>
    @endif
@endsection
