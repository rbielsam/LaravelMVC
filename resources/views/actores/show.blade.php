<div class="container mt-5">
    <h1>{{ $actor->nombre }}</h1>
    <div class="row">
        <div class="col-md-4">
            @if($actor->imatge)
                <img src="{{ asset('fotoActores/' . $actor->imatge) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x400" class="img-fluid">
            @endif
        </div>
        <div class="col-md-8">
            <p><strong>Nombre:</strong> {{ $actor->nombre }}</p>
            <p><strong>Fecha nacimiento:</strong> {{ $actor->fecha_nacimiento }}</p>
            <p><strong>País:</strong> {{ $actor->pais }}</p>
            <p><strong>Ha fallecido?</strong> {{ $actor->ha_fallecido }}</p>
            <p><strong>Núm Óscar:</strong> {{ $actor->num_oscar }}</p>

            <p><strong>Películas:</strong></p>
            <ul>
                @foreach($actor->peliculas as $pelicula)
                    <li>{{ $pelicula->titulo }}</li>
                @endforeach
            </ul>

            <a href="/actores/index" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
