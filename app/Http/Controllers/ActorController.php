<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    // Listar todos los actores
    public function index()
    {
        // Equivalent a: SELECT * FROM actores
        $totsElsActors = Actor::all();

        // Enviem les dades a la vista (com el ModelAndView)
        return view('actores.index', ['actores' => $totsElsActors]);
    }

    // Mostrar vista detalle actor
    public function show($id)
    {
        // Busquem la película pel seu ID. Si no existeix, donarà un error 404.
        $actor = \App\Models\Actor::findOrFail($id);
        return view('actores.show', compact('actor'));
    }

    // Eliminar Actor
    public function destroy($id)
    {
        // 1. Busca l'Actor per ID
        $actor = \App\Models\Actor::findOrFail($id);

        // 2. Crida el mètode d'esborrat
        $actor->delete();

        // 3. Redirecciona al llistat amb un missatge
        //$missatge = "Actor esborrat correctament"; ['missatge' => $missatge]
        return redirect('/actores/index');
    }

    // Crear nuevo Actor/Actriz
    public function create()
    {
        // Agafem totes les películes de la BD per llistar-los al formulari
        $peliculas = \App\Models\Pelicula::all();
        return view('actores.create', compact('peliculas'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // 1. Creem un objecte nou del nostre Model (com una fila buida a la taula)
        $nuevoActor = new \App\Models\Actor();

        // 2. Omplim cada camp amb el que l'usuari ha escrit al formulari.
        // Fem servir $request->input('NOM_DEL_CAMP_HTML')
        $nuevoActor->nombre = $request->input('nombre');
        $nuevoActor->fecha_nacimiento = $request->input('fecha_nacimiento');
        $nuevoActor->pais = $request->input('pais');
        $nuevoActor->ha_fallecido = $request->input('ha_fallecido');
        $nuevoActor->num_oscar = $request->input('num_oscar');

        // GESTIÓ DE LA IMATGE
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'storage/app/public/fotoActores'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('fotoActores'), $nomImatge);

            // Guardem el nom del fitxer a la base de dades
            $nuevoActor->imatge = $nomImatge;
        }

        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $nuevoActor->save();

        // Si l'usuari ha seleccionat pelicules al formulari:
        if ($request->has('peliculas')) {
            // attach() agafa l'array d'IDs de películes i els posa a la taula pivot
            //$nuevoActor->peliculas()->attach($request->input('peliculas'));
            $nuevoActor->peliculas()->sync($request->input('peliculas'));
        }
        else{
            $nuevoActor->peliculas()->detach();
        }

        // 4. Finalment, tornem al llistat d'actors' per veure que s'ha afegit correctament
        return redirect('/actores/index');
    }

    // Actualizar actor
    public function edit($id)
    {
        // Busca al actor/actriz por ID
        $actor = \App\Models\Actor::findOrFail($id);
        $peliculas = \App\Models\Pelicula::all();

        return view('actores.edit', compact('actor', 'peliculas'));
    }

    // Editar actor
    public function update(\Illuminate\Http\Request $request)
    {
        // 1. Creem un objecte nou del nostre Model (com una fila buida a la taula)
        $nuevoActor = \App\Models\Actor::findOrFail($request->id);


        // 2. Omplim cada camp amb el que l'usuari ha escrit al formulari.
        // Fem servir $request->input('NOM_DEL_CAMP_HTML')
        $nuevoActor->nombre = $request->input('nombre');
        $nuevoActor->fecha_nacimiento = $request->input('fecha_nacimiento');
        $nuevoActor->pais = $request->input('pais');
        $nuevoActor->ha_fallecido = $request->input('ha_fallecido');
        $nuevoActor->num_oscar = $request->input('num_oscar');

        // GESTIÓ DE LA IMATGE
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'storage/app/public/fotoActores'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('fotoActores'), $nomImatge);

            // Guardem el nom del fitxer a la base de dades
            $nuevoActor->imatge = $nomImatge;
        }

        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $nuevoActor->save();

        // Sincronitzar Pelicules
        if ($request->has('peliculas')) {
            // attach() agafa l'array d'IDs de películes i els posa a la taula pivot
            //$nuevoActor->peliculas()->attach($request->input('peliculas'));
            $nuevoActor->peliculas()->sync($request->input('peliculas'));
        }
        else{
            $nuevoActor->peliculas()->detach();
        }

        // 4. Finalment, tornem al llistat de pelicules per veure que s'ha afegit correctament
        return redirect('/actores/index');
    }

    public function listar()
    {
        // Busquem la película pel seu ID. Si no existeix, donarà un error 404.
        $listaActores = Actor::all();

        // Enviem les dades a la vista (com el ModelAndView)
        return view('actores.listar', ['listaActores' => $listaActores]);
    }

}
