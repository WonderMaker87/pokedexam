<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $primaryType = $request->input('primary_type');
        $secondaryType = $request->input('secondary_type');

        $pokemons = Pokemon::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->when($primaryType, function ($query, $primaryType) {
                return $query->where('primary_type_id', $primaryType);
            })
            ->when($secondaryType, function ($query, $secondaryType) {
                return $query->where('secondary_type_id', $secondaryType);
            })
            ->paginate(8);

        $types = Type::all();

        return view('welcome', compact('pokemons', 'types'));
    }

    public function show($id)
    {
        $pokemon = Pokemon::with(['primaryType.attacks', 'secondaryType.attacks'])->findOrFail($id);
        return view('show', compact('pokemon'));
    }
}
