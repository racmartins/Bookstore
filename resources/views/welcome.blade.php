{{-- resources/views/welcome.blade.php --}}

@extends('layouts.public')

@section('title', 'Livraria Online')

@section('custom-css')

@section('content')
<div class="text-center mt-5 pt-5">
    <img src="{{ asset('images/books.jpg') }}" alt="Livraria Online" class="bookstore-image">
    <h1 class="title m-b-md">Livraria Online</h1>
    <p class="lead">Bem-vindo à sua próxima aventura literária!</p>
    <div class="links my-4">
        <a href="{{ route('books.featured') }}" class="btn btn-outline-primary btn-custom">Livros em Destaque</a>
        <a href="/sobre" class="btn btn-outline-secondary btn-custom">Sobre Nós</a>
        <a href="{{ route('contact.create') }}" class="btn btn-outline-info btn-custom">Contacto</a>
        <a href="{{ route('eventos') }}" class="btn btn-outline-primary btn-custom">Eventos do Sistema</a>
    </div>
    @guest
        <div class="register-invitation">
            <p>Ainda não é membro? Considere a possibilidade de tornar-se membro solicitando-o aqui:</p>
            <a href="{{ route('contact.create') }}?preencher=mensagem" class="btn btn-success btn-custom">Criar Membro</a>
        </div>
    @endguest
</div>
@endsection
