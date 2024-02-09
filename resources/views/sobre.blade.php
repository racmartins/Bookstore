@extends('layouts.public')

@section('title', 'Sobre Nós')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-5">
                <h1 class="display-4">Sobre Nós</h1>
                <p class="fst-italic">Descubra a nossa missão, visão e os valores que nos guiam.</p>
            </div>

            <div class="bg-light p-5 rounded shadow-sm">
                <h2 class="mb-4">A Nossa História</h2>
                <p>Desde 2020, a Livraria Online vem se estabelecendo como uma referência no mercado literário em Braga, oferecendo um catálogo diversificado que atende a todos os tipos de leitores.</p>

                <h2 class="mb-4 mt-5">O que justifica escolher a nossa Livraria?</h2>
                <p>Estamos comprometidos em fornecer não apenas livros, mas experiências significativas através da leitura. O nosso ambiente acolhedor e equipe especializada garantem a melhor experiência para os nossos clientes.</p>

                <div class="mt-5">
                    <h2>Detalhes de Contato</h2>
                    <ul class="list-unstyled">
                        <li><strong>Endereço:</strong> Rua da Leitura, Nº 42, Loja 3, Braga, Portugal</li>
                        <li><strong>Telefone:</strong> +351 123 456 789</li>
                        <li><strong>Email:</strong> contacto@dominio.pt</li>
                    </ul>
                </div>

                <div class="mt-5">
                    <h2>Visite-nos</h2>
                    <p>Explorar a nossa loja é embarcar numa jornada pelo conhecimento e imaginação. Aguardamos a sua visita para ajudá-lo a descobrir a sua próxima leitura favorita.</p>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="/" class="btn btn-lg btn-primary">Voltar à Página Inicial</a>
                <a href="{{ route('contact.create') }}?preencher=mensagem" class="btn btn-lg btn-success">Solicitar Acesso</a>
            </div>
        </div>
    </div>
</div>
@endsection
