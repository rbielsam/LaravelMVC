<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula; // Importem el Model (com la Entity a Spring)

class PeliculaController extends Controller
{
    public function index()
    {
        // Equivalent a: SELECT * FROM peliculas
        $totesLesPelicules = Pelicula::all();

        // Enviem les dades a la vista (com el ModelAndView)
        return view('peliculas.index', ['peliculas' => $totesLesPelicules]);
    }

}
