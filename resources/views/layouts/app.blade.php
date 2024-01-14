<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <!-- Inclua o link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <!-- Barra de navegação simples -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bookstore</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/books') }}">Livros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/authors') }}">Autores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/publishers') }}">Editoras</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Conteúdo da View -->
        @yield('content')
    </div>

    <!-- Inclua o link para o Bootstrap JS e o Popper.js (se necessário) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>