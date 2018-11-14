<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todos() //Ver la lista de Pokémon
    {
        $pokemons = Pokemon::all();
        return view('Pokemon.index')->with('pokemons', $pokemons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()// Agregar un nuevo Pokémon
    {
        return view('Pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)// Agregar un nuevo Pokémon
    {
        $mensajes = [
            'required' => 'El :attribute es obligatorio.',
        ];

        $validaciones = [
            'name' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'type_id' => 'required',
        ];

        $this->validate($request, $validaciones, $mensajes);

        $pokemon = Pokemon::create([
            'name' => $request->input('name'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'type_id' => $request->input('type_id'),
        ]);
        return redirect('/pokemon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function uno($id) //Ver el detalle de un Pokémon
    {
        $poke = Pokemon::find($id);
        return view('Pokemon.pokecard')->with('poke', $poke);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function editar($id)// Modificar un Pokémon
    {
        $pokemon = Pokemon::find($id);
        return view('Pokemon.show')->with('pokemon', $pokemon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Pokemon $pokemon)// Modificar un Pokémon
    {
        $pokemon->name = $request->input('name');
        $pokemon->weight = $request->input('weight');
        $pokemon->height = $request->input('height');
        $pokemon->type_id = $request->input('type_id');

        $pokemon->save();
        return redirect('/pokemon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function borrar($id)//Eliminar un Pokémon
    {
        $pokemon = Pokemon::find($id);
        
        $pokemon -> delete();

        return redirect('/pokemon');
    }
}
