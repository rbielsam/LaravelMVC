<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/peliculas/index', [PeliculaController::class, 'index']);

// Rutas para crear nueva película por formulario
Route::get('/peliculas/crear', [PeliculaController::class, 'create']);

// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/peliculas/crear', [PeliculaController::class, 'store']);

// Ruta per a mostrar la película seleccionada del llistat
Route::get('/peliculas/{id}', [PeliculaController::class, 'show']);
