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
        <h1 class="header">Registra una Pelicula</h1>
        <div clas ="card">            
            <form action="{{route('peliculas.store', )}}">
                @csrf
                <div class = "inciso">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title"><br>
                </div>
                <!--
                <div class = "dropdown">
                    <label for="director_id">Director</label>
                        <select name="director_id" id="director_id">
                             @foreach ($directors as $director)
                                <option value="{{$director->id}}">{{$director->dir_name}}</option>
                             @endforeach
                        </select><br>
                </div> -->
                <div class = "inciso">
                    <label for="studio">Productora</label>
                    <input type="text" name="studio" id="studio"><br>
                </div>
                <div class = "inciso">
                    <label for="length">Duración</label>
                    <input type="number" name="length" id="length"><br>
                </div>
                <div class = "inciso">
                    <label for="genre">Género</label>
                    <input type="text" name="genre" id="genre"><br>
                </div>
                <div class = "inciso">
                    <label for="year">Año de Estreno</label>
                    <input type="number" name="year" id="year" min="1900" max="2100"> <br>
                </div>
                <div class = "inciso">
                    <label for="country">País de Origen</label>
                    <input type="text" name="country" id="country"> <br>
                </div>

                <input type="submit" value="Registrar Película" class="button1">

            </form>
        </div>
    </div>
</body>
</html>