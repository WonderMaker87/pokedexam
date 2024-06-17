<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use App\Http\Requests\PokemonStoreRequest;
use App\Http\Requests\PokemonUpdateRequest;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::with(['primaryType', 'secondaryType'])->paginate(10);
        return view('admin.pokemon.index', compact('pokemons'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.pokemon.create', compact('types'));
    }

    public function store(PokemonStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('img_path')) {
            $data['img_path'] = $request->file('img_path')->store('images', 'public');
        }

        $pokemon = Pokemon::create($data);
        return redirect()->route('pokemons.index')->with('success', 'Pokemon added successfully.');
    }

    public function show(Pokemon $pokemon)
    {
        return view('admin.pokemon.show', compact('pokemon'));
    }

    public function edit(Pokemon $pokemon)
    {
        $types = Type::all();
        return view('admin.pokemon.edit', compact('pokemon', 'types'));
    }

    public function update(PokemonUpdateRequest $request, Pokemon $pokemon)
    {
        $data = $request->validated();
        if ($request->hasFile('img_path')) {
            if ($pokemon->img_path) {
                Storage::delete($pokemon->img_path);
            }
            $data['img_path'] = $request->file('img_path')->store('images', 'public');
        }

        $pokemon->update($data);
        return redirect()->route('pokemons.index')->with('success', 'Pokemon updated successfully.');
    }

    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->img_path) {
            Storage::disk('public')->delete(str_replace('storage/', '', $pokemon->img_path));
        }
        $pokemon->delete();
        return redirect()->route('pokemons.index')->with('success', 'Pokemon deleted successfully.');
    }
}
