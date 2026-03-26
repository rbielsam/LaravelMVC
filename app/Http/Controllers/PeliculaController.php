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

    public function create()
    {
        // Agafem tots els actors de la BD per llistar-los al formulari
        $actores = \App\Models\Actor::all();
        return view('peliculas.create', compact('actores'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // 1. Creem un objecte nou del nostre Model (com una fila buida a la taula)
        $nuevaPelicula = new \App\Models\Pelicula();

        // 2. Omplim cada camp amb el que l'usuari ha escrit al formulari.
        // Fem servir $request->input('NOM_DEL_CAMP_HTML')
        $nuevaPelicula->titulo = $request->input('titulo');
        $nuevaPelicula->pais = $request->input('pais');
        $nuevaPelicula->anyo_estreno = $request->input('anyo_estreno');
        $nuevaPelicula->num_premios = $request->input('num_premios');
        $nuevaPelicula->num_nominaciones_a_oscar = $request->input('num_nominaciones_a_oscar');

        // GESTIÓ DE LA IMATGE
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('caratulas'), $nomImatge);

            // Guardem el nom del fitxer a la base de dades
            $nuevaPelicula->imatge = $nomImatge;
        }

        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $nuevaPelicula->save();

        // Si l'usuari ha seleccionat actors al formulari:
        if ($request->has('actores')) {
            // attach() agafa l'array d'IDs d'actors i els posa a la taula pivot
            //$nuevaPelicula->actores()->attach($request->input('actores'));
            $nuevaPelicula->actores()->sync($request->input('actores'));
        }
        else{
            $nuevaPelicula->actores()->detach();
        }

        // 4. Finalment, tornem al llistat de pelicules per veure que s'ha afegit correctament
        return redirect('/peliculas/index');
    }

    // Mostrar película (Detalle)
    public function show($id)
    {
        // Busquem la película pel seu ID. Si no existeix, donarà un error 404.
        $pelicula = \App\Models\Pelicula::findOrFail($id);
        return view('peliculas.show', compact('pelicula'));
    }

    // Borrar película
    public function destroy($id)
    {
        // 1. Busca la película per ID
        $pelicula = \App\Models\Pelicula::findOrFail($id);

        // 2. Crida el mètode d'esborrat
        $pelicula->delete();

        // 3. Redirecciona al llistat amb un missatge
        //$missatge = "Película borrada correctamente"; ['missatge' => $missatge]
        return redirect('/peliculas/index');
    }

    // Vista editar película
    public function edit($id)
    {
        // Busca la película por ID
        $pelicula = \App\Models\Pelicula::findOrFail($id);
        $actores = \App\Models\Actor::all();

        return view('peliculas.edit', compact('pelicula', 'actores'));
    }

    // Editar película
    public function update(\Illuminate\Http\Request $request)
    {
        // 1. Creem un objecte nou del nostre Model (com una fila buida a la taula)
        $nuevaPelicula = \App\Models\Pelicula::findOrFail($request->id);


        // 2. Omplim cada camp amb el que l'usuari ha escrit al formulari.
        // Fem servir $request->input('NOM_DEL_CAMP_HTML')
        $nuevaPelicula->titulo = $request->input('titulo');
        $nuevaPelicula->pais = $request->input('pais');
        $nuevaPelicula->anyo_estreno = $request->input('anyo_estreno');
        $nuevaPelicula->num_premios = $request->input('num_premios');
        $nuevaPelicula->num_nominaciones_a_oscar = $request->input('num_nominaciones_a_oscar');

        // GESTIÓ DE LA IMATGE
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('caratulas'), $nomImatge);

            // Guardem el nom del fitxer a la base de dades
            $nuevaPelicula->imatge = $nomImatge;
        }

        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $nuevaPelicula->save();

        // Sincrnitzar Actors
        if ($request->has('actores')) {
            // attach() agafa l'array d'IDs d'actors i els posa a la taula pivot
            //$nuevaPelicula->actores()->attach($request->input('actores'));
            $nuevaPelicula->actores()->sync($request->input('actores'));
        }
        else{
            $nuevaPelicula->actores()->detach();
        }

        // 4. Finalment, tornem al llistat de pelicules per veure que s'ha afegit correctament
        return redirect('/peliculas/index');
    }

}
