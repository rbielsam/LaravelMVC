<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Actor/Actriz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Agregar Actor/Actriz</h1>

<form action="/actores/crear" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
    @csrf  <div class="mb-3">
        <label class="form-label">Nombre del/la actor/actriz</label>
        <input type="text" name="nombre" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">País</label>
        <input type="text" name="pais" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Ha fallecido?</label>
        <!--<input type="text" name="ha_fallecido" class="form-control">-->
        <select name="ha_fallecido">
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>>
    </div>

    <div class="mb-3">
        <label class="form-label">Núm Óscar</label>
        <input type="number" step="0.01" name="num_oscar" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Foto Actor</label>
        <input type="file" name="imatge" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Selecciona les películes:</label>
        <select name="peliculas[]" class="form-select" multiple>
            @foreach($peliculas as $pelicula)
                <option value="{{ $pelicula->id }}">{{ $pelicula->titulo }}</option>
            @endforeach
        </select>
        <small class="text-muted">Mantingues premut Ctrl per seleccionar-ne més d'una.</small>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Actor</button>
    <a href="/actores/index" class="btn btn-link">Volver atrás</a>
</form>
</body>
</html>
