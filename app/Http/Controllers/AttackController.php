<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttackStoreRequest;
use App\Http\Requests\AttackUpdateRequest;
use App\Models\Attack;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class AttackController extends Controller
{
    public function index()
    {
        $attacks = Attack::orderByDesc('name')
            ->paginate(15)
        ;

        return view(
            'admin.attacks.index',
            [
                'attacks' => $attacks,
            ]
        );
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.attacks.create', compact('types'));
    }

    public function edit($id)
    {
        $attack = Attack::findOrFail($id);
        $types = Type::all();
        return view('admin.attacks.edit', compact('attack', 'types'));
    }


    public function store(AttackStoreRequest $request, Attack $attack)
    {
        $validated = $request->validated();
    
        $attack->fill($validated);

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images', 'public');
            $attack->img_path = $path;
        }

        $attack->save();

        return redirect()->route('attacks.index');
    }
    public function update(AttackUpdateRequest $request, Attack $attack)
    {
        $validated = $request->validated();
    
        $attack->fill($validated);
    
        if ($request->hasFile('img_path')) {
            if ($attack->img_path) {
                Storage::disk('public')->delete($attack->img_path);
            }

            $path = $request->file('img_path')->store('images', 'public');
            $attack->img_path = $path;
        }
    
        $attack->save();
    
        return redirect()->route('attacks.index')->with('success', 'Attack updated successfully');
    }


    
    public function destroy(Attack $attack)
    {
        if ($attack->img_path) {
            Storage::disk('public')->delete(str_replace('storage/', '', $attack->img_path));
        }

        $attack->delete();
        return redirect()->route('attacks.index');
    }
}