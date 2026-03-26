<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Actors - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h1 class="mb-4">Llistat d'actors</h1>
<h2 class="mb-4">-rbielsa–</h2>

<a href="/actores/crear" class="btn btn-success mb-3">Afegir nou actor</a>
<a href="/peliculas/index" class="btn btn-success mb-3">Llista de Películes</a>

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Nom</th>
        <th>Data naixement</th>
        <th>País</th>
        <th>Ha mort</th>
        <th>Num óscars</th>
        <th>Data de creació</th>
        <th>Darrera modificació</th>
        <th>Accions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($actores as $actor)
        <tr>
            <td>{{ $actor->nombre }}</td>
            <td>{{ $actor->fecha_nacimiento }}</td>
            <td>{{ $actor->pais }}</td>
            <td>{{ $actor->ha_fallecido }}</td>
            <td>{{ $actor->num_oscar }}</td>
            <td>{{ $actor->created_at}}</td>
            <td>{{ $actor->updated_at}}</td>
            <td>
                <a href="/actores/ver/{{ $actor->id }}" class="btn btn-info btn-sm">Ver</a>
                <a href="/actores/eliminar/{{ $actor->id }}" class="btn btn-info btn-sm">Eliminar</a>
                <a href="/actores/editar/{{ $actor->id }}" class="btn btn-info btn-sm">Editar</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">No hi ha actors al llistat.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
