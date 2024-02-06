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
    <!-- Custom Styles -->
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Livraria Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Registar</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center mt-5 pt-5">
        <img src="{{ asset('images/books.jpg') }}" alt="Livraria Online" class="bookstore-image">
        <h1 class="title m-b-md">Livraria Online</h1>
        <p class="lead">Bem-vindo à sua próxima aventura literária!</p>
        <div class="links my-4">
            <a href="{{route('books.featured')}}" class="btn btn-outline-primary btn-custom">Livros</a>
            <a href="/sobre" class="btn btn-outline-secondary btn-custom">Sobre Nós</a>
            <a href="{{ route('contact.create') }}" class="btn btn-outline-info btn-custom">Contacto</a>

        </div>
        @guest
            <div class="register-invitation">
                <p>Ainda não é membro? Considere a possibilidade de tornar-se membro solicitando-o aqui:</p>
                <a href="{{ route('contact.create') }}?preencher=mensagem" class="btn btn-success btn-custom">Criar Membro</a>


            </div>
        @endguest
    </div>
</body>
</html>


