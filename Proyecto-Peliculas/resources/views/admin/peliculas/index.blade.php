<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas JDB</title>
    <!--CSS Chafa-->
    <style>
    .card {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 10px;
      margin: 10px;
      width: 200px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      color: wheat;
      background-color: darkolivegreen;
    }
  </style>
</head>
<body>
    <h1 class="header">Peliculas Disponibles</h1>
    
    <div class="card">
        <a href="{{route(peliculas.create)}}">Registrar Película</a>
    </div>

    @foreach($peliculas as $peli)
        <div clas ="card">
            <h2>{{ peli->peli_title }}</h2>
            <ul>
                <li>{{ peli->peli_genre }}</li>
                <li>{{ peli->peli_length }}</li>
                <li>{{ peli->peli_year }}</li>
            </ul>
            <a href="{{route('peliculas.show', $pelicula->id)}}" style="color: lightcoral;">Más Información</a>
        </div>
    @endforeach
</body>
</html>