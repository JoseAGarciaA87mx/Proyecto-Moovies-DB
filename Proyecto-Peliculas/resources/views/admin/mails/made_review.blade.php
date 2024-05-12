<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Publicación de Reseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        strong {
            color: #333;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="h1">Notificación de Publicación de Reseña</h1>
        <p>Estimado/a Miembro: <span>{{ $user_name }}</span></p> 
        <p>Se ha publicado tu reseña a la película: <strong>{{ $peli_title }}</strong>. ¡Sigamos ayudando a que esta comunidad crezca!</p>
        <p>Continúa compartiendo tu opinión haciendo clic en el siguiente enlace:</p>
        <p><a class="a" href="{{ route('dashboard') }}">Ir a la página de inicio</a></p>
        <p>Gracias por contribuir.</p>
        <p>Saludos,</p>
        <p>El equipo de Movies Project</p>
    </div>

    <div class="container">
        @include( 'admin.peliculas_users.partial_view_comment', ['review' => $review] )
    </div>
</body>
</html>
