<!-- resources/views/publishers/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalhes da Editora</h1>

    @if($publisher)
        <p><strong>Nome:</strong> {{ $publisher['name'] }}</p>
        <p><strong>Ano de Fundação:</strong> {{ $publisher['foundation_year'] }}</p>
    @else
        <p>Editora não encontrada.</p>
    @endif
@endsection
