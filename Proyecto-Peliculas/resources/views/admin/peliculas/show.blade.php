<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas JDB</title>
    <!--CSS Chafa-->
    <style>
  </style>
</head>
<body>  
        <div clas ="card">
            <h1 class="header">{{ $pelicula->peli_title }}</h1>
            <div class="card"> 
                <a href="{{route('peliculas.index')}}">Todas las Películas</a>
                <a href="{{route('peliculas.create')}}">Registrar Película</a>
            </div>  
            <ul>
                <li><span style="color: darkolivegreen;"> Productora: </span> {{ $pelicula->peli_studio }}</li>
                <li><span style="color: darkolivegreen;"> País de Origen: </span> {{ $pelicula->peli_country }}</li>
                <li><span style="color: darkolivegreen;"> Género: </span> {{ $pelicula->peli_genre }}</li>
                <li><span style="color: darkolivegreen;"> Duración: </span> {{ $pelicula->peli_length }} min</li>
                <li><span style="color: darkolivegreen;"> Año de Estreno: </span> {{ $pelicula->peli_year }}</li>
            </ul>

            <a href="{{route('peliculas.edit', $pelicula)}}" style="color: lightcoral;">Administrar Película</a>
        </div>
</body>
</html>