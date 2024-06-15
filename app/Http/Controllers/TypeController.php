<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Models\Type;
use Illuminate\Http\Request;

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

    public function store(TypeStoreRequest $request)
    {
        $type = Type::make();

        $type->name = $request->validated()['name'];
        $type->color = $request->validated()['color'];

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('types', 'public');
            $type->img_path = 'storage/' . $path;
        }

        $type->save();

        return redirect()->route('types.index');
    }
    public function update(TypeUpdateRequest $request, Type $type)
    {

        $type->name = $request->validated()['name'];
        $type->color = $request->validated()['color'];

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('types', 'public');
            $type->img_path = 'storage/' . $path;
        }

        $type->save();
    }
}
