<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ActorController;

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
Route::get('/peliculas/{id}', [PeliculaController::class, 'destroy']);

// Ruta per editar la película seleccionada del llistat
Route::get('/peliculas/editar/{id}', [PeliculaController::class, 'edit']);
Route::put('/peliculas/editar/{id}', [PeliculaController::class, 'update']);

// Ruta per mostrar index d'actors
Route::get('/actores/index', [ActorController::class, 'index']);

// Ruta per mostrar detall de cada Actor
Route::get('/actores/ver/{id}', [ActorController::class, 'show']);

// Ruta per eliminar Actor
Route::get('/actores/eliminar/{id}', [ActorController::class, 'destroy']);

// Ruta per eafegir un nou Actor
Route::get('/actores/crear', [ActorController::class, 'create']);

// Aquesta ruta serveix per REBRE les dades del formulari
Route::post('/actores/crear', [ActorController::class, 'store']);

// Ruta per editar i actualitzar l'actor seleccionat del llistat
Route::get('/actores/editar/{id}', [ActorController::class, 'edit']);
Route::put('/actores/editar/{id}', [ActorController::class, 'update']);
