<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Cinema - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h1 class="mb-4">Llistat de Pelicules per actors</h1>
<h2 class="mb-4">-rbielsa–</h2>

<a href="/peliculas/crear" class="btn btn-success mb-3">Añadir nueva película</a>
<a href="/actores/index" class="btn btn-success mb-3">Lista de Actores</a>
<a href="/peliculas/listar/pelisactores" class="btn btn-success mb-3">Ver películes por actores</a>
<a href="/actores/listar" class="btn btn-success mb-3">Ver actores por películas</a>

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Títol</th>
        <th>Actors</th>

    </tr>
    </thead>
    <tbody>
    @forelse($listaPeliculas as $pelicula)
        <tr>
            <td>{{ $pelicula->titulo }}</td>
            <td>
                <ul>
                    @foreach($pelicula->actores as $actor)
                        <li>{{ $actor->nombre }}</li>
                    @endforeach
                </ul>
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
