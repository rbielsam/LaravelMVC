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
Route::get('/peliculas/ver/{id}', [PeliculaController::class, 'show']);

// Ruta per esborrar la película seleccionada del llistat
Route::delete('/peliculas/{id}', [PeliculaController::class, 'destroy']);

// Ruta per editar la película seleccionada del llistat
Route::get('/peliculas/editar/{id}', [PeliculaController::class, 'edit']);
Route::put('/peliculas/editar/{id}', [PeliculaController::class, 'update']);
