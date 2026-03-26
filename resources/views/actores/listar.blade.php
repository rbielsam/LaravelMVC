<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Actors - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h1 class="mb-4">Llistat d'actors per película</h1>
<h2 class="mb-4">-rbielsa–</h2>

<a href="/peliculas/crear" class="btn btn-success mb-3">Añadir nueva película</a>
<a href="/actores/index" class="btn btn-success mb-3">Lista de Actores</a>
<a href="/peliculas/listar/pelisactores" class="btn btn-success mb-3">Ver películes por actores</a>
<a href="/actores/listar" class="btn btn-success mb-3">Ver actores por películas</a>

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Nom Actor/Actriu</th>
        <th>Películes</th>
    </tr>
    </thead>
    <tbody>
    @forelse($listaActores as $actor)
        <tr>
            <td>{{ $actor->nombre }}</td>
            <td>
                <ul>
                    @foreach($actor->peliculas as $pelicula)
                        <li><a href="/peliculas/ver/{{ $pelicula->id }}" class="btn btn-info btn-sm">{{ $pelicula->titulo }}</a></li>
                    @endforeach
                </ul>
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
