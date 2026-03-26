<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar actor/actriz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Editar película {{ $actor->nombre }}</h1>

<form action="/actores/editar/{{ $actor->id }}" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
    @csrf @method('PUT') <div class="mb-3">
        <label class="form-label">Nombre del actor/actriz</label>
        <input type="text" name="nombre" value={{$actor->nombre}} class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" value={{$actor->fecha_nacimiento}} class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">País</label>
        <input type="text" name="pais" value={{$actor->pais}} class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Ha fallecido?</label>
        <select name="ha_fallecido">
            <option value="0" {{ $actor->ha_fallecido ? '' : 'selected' }}>No</option>
            <option value="1" {{ $actor->ha_fallecido ? 'selected' : '' }}>Si</option>
        </select>>
    </div>

    <div class="mb-3">
        <label class="form-label">Núm Óscar</label>
        <input type="number" step="0.01" name="num_oscar" value={{$actor->num_oscar}} class="form-control">
    </div>

    <select name="peliculas[]" class="form-select" multiple>
        @foreach($peliculas as $pelicula)
            @if ($actor->peliculas->contains('id', $pelicula->id))
                <option value="{{ $pelicula->id }}" selected>{{ $pelicula->titulo }}</option>
            @else
                <option value="{{ $pelicula->id }}">{{ $pelicula->titulo }}</option>
            @endif
        @endforeach
    </select>

    <div class="mb-3">
        <label class="form-label">Foto Actor/Actriz</label>
        <input type="file" name="imatge" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar en el cine</button>
    <a href="/peliculas/index" class="btn btn-link">Volver atrás</a>
</form>
</body>
</html>
