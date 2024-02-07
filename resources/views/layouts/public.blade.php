<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Livraria Online')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;800&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    @yield('custom-css')
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f0f2f5;
            }
            .title {
                font-size: 72px; /* Aumentado para maior destaque */
                color: #212529;
            }
            .lead {
                font-size: 24px; /* Aumentado para melhor visibilidade */
            }
            .bookstore-image {
                max-width: 400px; /* Ajustado conforme solicitação */
                height: auto;
                margin-bottom: 20px; /* Espaçamento entre a imagem e o título */
            }
            .btn-custom {
                padding: 10px 20px; /* Mais espaço para conforto no clique */
                font-size: 18px; /* Tamanho aumentado para fácil leitura */
            }
            .register-invitation {
                margin-top: 40px;
                font-size: 20px;
            }
            /* Adicionar estilos personalizados para a navbar */
            .navbar .navbar-brand,
            .navbar .nav-link {
                font-size: 1.2rem; /* Aumentar o tamanho da fonte */
            }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <img src="images/logo.png" alt="Logo" style="height: 40px;" class="me-2">
            <a class="navbar-brand" href="/">Livraria Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    @auth
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @if(Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Registar</a>
                        @endif
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
