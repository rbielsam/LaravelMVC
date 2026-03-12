<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Cinema - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1 class="mb-4">Llistat de Pelicules</h1>
<h2 class="mb-4">-rbielsa–</h2>

<a href="/peliculas/crear" class="btn btn-success mb-3">Añadir nueva película</a>

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Títol</th>
        <th>País</th>
        <th>Any d'estrenament</th>
        <th>N premis</th>
        <th>Num Nominacions a óscars</th>
        <th>Data de creació</th>
        <th>Darrera modificació</th>
        <th>Accions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($peliculas as $pelicula)
        <tr>
            <td>{{ $pelicula->titulo }}</td>
            <td>{{ $pelicula->pais }}</td>
            <td>{{ $pelicula->anyo_estreno }}</td>
            <td>{{ $pelicula->num_premios }}</td>
            <td>{{ $pelicula->num_nominaciones_a_oscar }}</td>
            <td>{{ $pelicula->created_at}}</td>
            <td>{{ $pelicula->updated_at}}</td>
            <td>
                <a href="/peliculas/{{ $pelicula->id }}" class="btn btn-info btn-sm">Ver</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">No hi ha pellícules al cinema.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
