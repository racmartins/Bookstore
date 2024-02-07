@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contactos</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                <td>{{ $contact->created_at->format('H:i') }}</td>
                <td>
                    @if ($contact->status === 'pendente')
                        <form action="{{ route('contacts.updateStatus', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="respondido">
                            <button type="submit" class="btn btn-sm btn-outline-success">Marcar como Respondido</button>
                        </form>
                    @else
                        <span class="badge bg-success">Respondido</span>
                        <form action="{{ route('contacts.updateStatus', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="pendente">
                            <button type="submit" class="btn btn-sm btn-outline-warning">Marcar como Pendente</button>
                        </form>
                    @endif
                </td>
                <td>
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-outline-info">Ver</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja remover este contato?');">Remover</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
@endsection
