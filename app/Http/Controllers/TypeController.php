<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeStoreRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderByDesc('name')
            ->paginate(15)
        ;

        return view(
            'admin.types.index',
            [
                'types' => $types,
            ]
        );
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }



    public function store(TypeStoreRequest $request)
    {
        $type = Type::make();

        $type->name = $request->validated()['name'];
        $type->color = $request->validated()['color'];

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images', 'public');
            $type->img_path = $path;
        }

        $type->save();

        return redirect()->route('types.index');
    }
    public function update(Request $request, Type $type)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:255',
    ]);

    $type->name = $validated['name'];
    $type->color = $validated['color'];
    if ($request->hasFile('img_path')) {
        if ($type->img_path) {
            Storage::disk('public')->delete(str_replace('storage/', '', $type->img_path));
        }
    
        $path = $request->file('img_path')->store('images', 'public');
        $type->img_path = $path;
    }
    $type->save();

    return redirect()->route('types.index');
}


    
    public function destroy(Type $type)
    {
        if ($type->img_path) {
            Storage::disk('public')->delete(str_replace('storage/', '', $type->img_path));
        }

        $type->delete();
        return redirect()->route('types.index');
    }
}
