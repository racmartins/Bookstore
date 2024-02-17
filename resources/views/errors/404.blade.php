{{-- resources/views/errors/404.blade.php --}}

@extends('layouts.app')

@section('title', 'Página Não Encontrada')

@section('content')
<div class="container">
    <h1>Página Não Encontrada</h1>
    <p>Desculpe, a página que está procurando não existe.</p>
    <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Voltar para a Página Inicial</a>
</div>
@endsection
