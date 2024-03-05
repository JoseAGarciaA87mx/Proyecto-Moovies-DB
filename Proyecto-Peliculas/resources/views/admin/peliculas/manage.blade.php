<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas JDB</title>
    <!--CSS Chafa-->
    <style>
    /* Estilos opcionales para mejorar la presentación de las tarjetas */
    .inciso {
      border: 1px solid #ccc;
      border-radius: 8px;
      border-color: darkblue;
      padding: 10px;
      margin: 10px;
      width: 200px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
    <div class="main_frame">
        <h1 class="header">{{$title}}</h1>
        <div class="card"> 
                <a href="{{route('peliculas.index')}}">Todas las Películas</a>
                <a href="{{route('peliculas.create')}}">Registrar Película</a>
        </div>  

        <div clas ="card">            
            <form action="{{route('peliculas.update', $pelicula)}}" method="POST">
                @csrf
                @method('PUT')
                <div class = "inciso">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" value="{{$pelicula->peli_title}}"><br>
                </div>

                <!-- Aquí Pongo lo de Directores-->

                <div class = "inciso">
                    <label for="studio">Productora</label>
                    <input type="text" name="studio" id="studio", value="{{$pelicula->peli_studio}}"><br>
                </div>
                <div class = "inciso">
                    <label for="length">Duración</label>
                    <input type="number" name="length" id="length" value="{{$pelicula->peli_length}}"><br>
                </div>
                <div class = "inciso">
                    <label for="genre">Género</label>
                    <input type="text" name="genre" id="genre" value="{{$pelicula->peli_genre}}"><br>
                </div>
                <div class = "inciso">
                    <label for="year">Año de Estreno</label>
                    <input type="number" name="year" id="year" min="1900" max="2100" value="{{$pelicula->peli_year}}"><br>
                </div>
                <div class = "inciso">
                    <label for="country">País de Origen</label>
                    <input type="text" name="country" id="country" value="{{$pelicula->peli_country}}"> <br>
                </div>

                <input type="submit" value="Modificar Película" class="button1"><br>
            </form>
        </div>

        <div class="card">
            <form action="{{route('peliculas.destroy', $pelicula)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar Película" class='button2'>
            </form>
        </div>
        
    </div>
</body>
</html>