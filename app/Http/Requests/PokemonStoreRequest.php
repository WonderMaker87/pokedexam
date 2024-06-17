<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:pokemon,name',
            'hp' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'img_path' => 'required|image',
            'primary_type_id' => 'required|exists:types,id',
            'secondary_type_id' => 'nullable|exists:types,id',
        ];
    }
}
