<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria Online</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Custom Styles -->
    @yield('custom-css')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f2f5;
        }
        .title {
            font-size: 72px;
            color: #212529;
        }
        .lead {
            font-size: 24px;
        }
        .bookstore-image {
            max-width: 400px;
            height: auto;
            margin-bottom: 20px;
        }
        .btn-custom {
            padding: 10px 20px;
            font-size: 18px;
        }
        .register-invitation {
            margin-top: 40px;
            font-size: 20px;
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            font-size: 1.2rem;
            font-weight: 500; /* Torna o texto mais carregado aumentando o peso da fonte */
            color: #343a40 !important; /* Muda a cor para um tom de preto mais carregado */
        }
        .user-area {
            background-color: #0095f6; /* Cor de fundo mais clara */
            color: white !important; /* Força a cor do texto a ser branca */
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove o sublinhado */
            display: inline-flex; /* Alinha ícones e texto */
            align-items: center; /* Centraliza verticalmente ícones e texto */
            gap: 5px; /* Espaço entre ícone e texto */
        }
        .user-area:hover, .user-area:focus {
            background-color: #0077b6; /* Cor de fundo mais escura ao passar o mouse ou focar */
            color: #ffffff; /* Cor do texto */
        }
        .login-button {
            background-color: #28a745;
            border-color: #28a745;
        }
        .login-button:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;" class="me-2">
            <a class="navbar-brand" href="/">Livraria Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    @auth
                        <a class="nav-link user-area" href="{{ url('/dashboard') }}">
                            <i class="bi bi-person-fill"></i> Área do Utilizador
                        </a>
                    @else
                        <a class="btn btn-primary login-button" href="{{ route('login') }}" role="button">
                            <i class="bi bi-box-arrow-in-right"></i> Entrar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('custom-js')
</body>
</html>
