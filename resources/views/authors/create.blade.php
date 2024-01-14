@extends('layouts.app')

@section('content')
    <h1>Criar Novo Autor</h1>
    <form method="POST" action="/authors">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="birth_year">Ano de Nascimento:</label>
            <input type="number" class="form-control" id="birth_year" name="birth_year" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Autor</button>
    </form>
@endsection
