@extends('layouts.app')

@section('content')
    <h1>Criar Nova Editora</h1>
    <form method="POST" action="/publishers">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="foundation_year">Ano de Fundação:</label>
            <input type="number" class="form-control" id="foundation_year" name="foundation_year" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Editora</button>
    </form>
@endsection
