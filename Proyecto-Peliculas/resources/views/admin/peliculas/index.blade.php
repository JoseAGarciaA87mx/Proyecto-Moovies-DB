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
    <h1 class="header">Agrega una Pelicula</h1>
    

    @foreach($peliculas as $peli)
        <div clas ="card">
            <h2>{{ peli->peli_title }}</h2>
            <ul>{{ peli->peli_studio }}</ul>
            <ul>{{ peli->peli_country }}</ul>
            <ul>{{ peli->peli_genre }}</ul>
            <ul>{{ peli->peli_length }}</ul>
            <ul>{{ peli->peli_year }}</ul>
        </div>
    @endforeach
</body>
</html>