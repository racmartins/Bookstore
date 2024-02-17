{{-- resources/views/users/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Criar Novo Utilizador</div>
                <div class="card-body">
                    <form action="{{ route('manage-users.store') }}" method="post" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            <div class="invalid-feedback">
                                Por favor, insira o nome do utilizador.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            <div class="invalid-feedback">
                                Por favor, insira um email válido.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            <div class="invalid-feedback">
                                Por favor, insira uma senha.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('manage-users.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Exemplo de validação de formulário do Bootstrap
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection

