<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Editar película {{ $pelicula->titulo }}</h1>

<form action="/peliculas/editar/{{ $pelicula->id }}" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
    @csrf @method('PUT') <div class="mb-3">
        <label class="form-label">Título de la película</label>
        <input type="text" name="titulo" value={{$pelicula->titulo}} class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">País</label>
        <input type="text" name="pais" value={{$pelicula->pais}} class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Año de estreno</label>
        <input type="number" name="anyo_estreno" value={{$pelicula->anyo_estreno}} class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Número de premios</label>
        <input type="number" name="num_premios" value={{$pelicula->num_premios}} class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Núm nominaciones a Óscar</label>
        <input type="number" step="0.01" name="num_nominaciones_a_oscar" value={{$pelicula->num_nominaciones_a_oscar}} class="form-control">
    </div>

    <select name="actores[]" class="form-select" multiple>
        @foreach($actores as $actor)
            @if ($pelicula->actores->contains('id', $actor->id))
                <option value="{{ $actor->id }}" selected>{{ $actor->nombre }}</option>
            @else
                <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
            @endif
        @endforeach
    </select>

    <div class="mb-3">
        <label class="form-label">Carátula</label>
        <input type="file" name="imatge" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar en el cine</button>
    <a href="/peliculas/index" class="btn btn-link">Volver atrás</a>
</form>
</body>
</html>
