<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pokemons = Pokemon::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(8);

        return view('welcome', compact('pokemons'));
    }

    public function show($id)
    {
        $pokemon = Pokemon::with(['primaryType.attacks', 'secondaryType.attacks'])->findOrFail($id);
        return view('show', compact('pokemon'));
    }

    
}
