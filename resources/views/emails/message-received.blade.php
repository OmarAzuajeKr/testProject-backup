<!DOCTYPE html>
<html>
<head>
    <title>Mensaje Recibido</title>
</head>
<body>
    <h1>Has recibido un nuevo mensaje</h1>
    <p><strong>Nombre:</strong> {{ $message['name'] }}</p>
    <p><strong>Email:</strong> {{ $message['email'] }}</p>
    <p><strong>Asunto:</strong> {{ $message['subject'] }}</p>
    <p><strong>Contenido:</strong> {{ $message['content'] }}</p>
</body>
</html>