<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        .navbar-brand {
            margin-right: 150px; /* Ajuste o valor conforme necessário */
        }
        .nav-profile {
            display: flex;
            align-items: center;
        }

        .nav-profile img {
            margin-right: 8px;
        }

        .logo {
            filter: brightness(90%); /* Ajuste o valor conforme necessário */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 30px;" class="logo">
                <span class="ms-2 text-white" >Bookstore</span>
            </a>
            <!-- Botão de colapso para dispositivos móveis -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Botão Área Pública -->
                    <div class="ms-auto dropdown">
                        <button class="btn btn-info" type="button" id="publicAreaToggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe"></i> Área Pública
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="publicAreaToggle">
                            <li><a class="dropdown-item" href="{{ route('books.featured') }}">Livros em Destaque</a></li>
                            <li><a class="dropdown-item" href="/sobre">Sobre Nós</a></li>
                            <li><a class="dropdown-item" href="{{ route('contact.create') }}">Contacto</a></li>
                            <li><a class="dropdown-item" href="{{ route('eventos') }}">Eventos Públicos</a></li>
                            <!-- Adicione outras opções conforme necessário -->
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link mx-3 text-white" href="{{ url('/books') }}">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3 text-white" href="{{ url('/authors') }}">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3 text-white" href="{{ url('/publishers') }}">Editoras</a>
                    </li>
                    <!-- Novo item de menu para Eventos -->
                    <li class="nav-item">
                        <a class="nav-link mx-3 text-white" href="{{ url('/events') }}">Eventos</a>
                    </li>
                    <!-- Link de gestão de contactos visível apenas para administradores -->
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link mx-3 text-white" href="{{ route('contacts.index') }}">Gestão de Contactos</a>
                            </li>
                        @endif
                    @endauth
                    <!-- Link de gestão de utilizadores visível apenas para administradores -->
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link mx-3 text-white" href="{{ route('manage-users.index') }}">Gestão de Utilizadores</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown nav-profile">
                            <!-- Imagem de perfil -->
                            @if (Auth::user()->profile_photo)
                                <img src="{{ asset(Auth::user()->profile_photo) }}" alt="Foto do Perfil" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                            @endif
                            <!-- Link para ativar o dropdown -->
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">Ver Perfil</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Editar Perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
