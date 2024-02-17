<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Inscrição no Evento</title>
</head>
<body>
    <h1>{{ $event->title }}</h1>
    <p>Obrigado por se inscrever no evento! Aqui estão os detalhes do evento:</p>
    <p>{{ $event->description }}</p>
    <p>Data e Hora: {{ $event->start_time->format('d/m/Y H:i') }} - {{ $event->end_time->format('d/m/Y H:i') }}</p>
    <p>Localização: {{ $event->location }}</p>
    <p>Por favor, chegue com a antecedência de 15 minutos e traga o e-mail de confirmação.</p>
</body>
</html>
