{{-- resources/views/contacts/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Contacto</h1>
    <div class="card">
        <div class="card-header">
            Detalhes do Contacto
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $contact->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="card-text"><strong>Mensagem:</strong> {{ $contact->message }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
