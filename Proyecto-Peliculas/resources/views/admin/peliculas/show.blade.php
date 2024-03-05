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
        <div clas ="card">
            <h1 class="header">{{ pelicula->peli_title }}</h1>
            <ul>
                <li>{{ pelicula->peli_studio }}</li>
                <li>{{ pelicula->peli_country }}</li>
                <li>{{ pelicula->peli_genre }}</li>
                <li>{{ pelicula->peli_length }}</li>
                <li>{{ pelicula->peli_year }}</li>
            </ul>

            <a href="{{route('peliculas.edit', $pelicula)}}" style="color: lightcoral;">Administrar Película</a>
        </div>
</body>
</html>