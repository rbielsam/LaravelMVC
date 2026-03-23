<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Nueva película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Agregar película al cine</h1>

<form action="/peliculas/crear" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
    @csrf  <div class="mb-3">
        <label class="form-label">Título de la película</label>
        <input type="text" name="titulo" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">País</label>
        <input type="text" name="pais" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Año de estreno</label>
        <input type="number" name="anyo_estreno" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Número de premios</label>
        <input type="number" name="num_premios" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Núm nominaciones a Óscar</label>
        <input type="number" step="0.01" name="num_nominaciones_a_oscar" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Carátula</label>
        <input type="file" name="imatge" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Selecciona els actors:</label>
        <select name="actores[]" class="form-select" multiple>
            @foreach($actores as $actor)
                <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
            @endforeach
        </select>
        <small class="text-muted">Mantingues premut Ctrl per seleccionar-ne més d'un.</small>
    </div>

    <button type="submit" class="btn btn-primary">Guardar en el cine</button>
    <a href="/peliculas/index" class="btn btn-link">Volver atrás</a>
</form>
</body>
</html>
