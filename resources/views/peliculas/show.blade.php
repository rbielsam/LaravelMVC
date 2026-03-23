<div class="container mt-5">
    <h1>{{ $pelicula->titulo }}</h1>
    <div class="row">
        <div class="col-md-4">
            @if($pelicula->imatge)
                <img src="{{ asset('caratulas/' . $pelicula->imatge) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x400" class="img-fluid">
            @endif
        </div>
        <div class="col-md-8">
            <p><strong>Título:</strong> {{ $pelicula->titulo }}</p>
            <p><strong>País:</strong> {{ $pelicula->pais }}</p>
            <p><strong>Año de estreno:</strong> {{ $pelicula->anyo_estreno }}</p>
            <p><strong>Número de premios:</strong> {{ $pelicula->num_premios }}</p>
            <p><strong>Nominaciones a Óscar:</strong> {{ $pelicula->num_nominaciones_a_oscar }}</p>

            <p><strong>Actores:</strong></p>
            <ul>
                @foreach($pelicula->actores as $actor)
                    <li>{{ $actor->nombre }}</li>
                @endforeach
            </ul>

            <a href="/peliculas/index" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
