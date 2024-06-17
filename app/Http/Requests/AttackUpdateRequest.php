<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttackUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:attacks,name,' . $this->attack->id,
            'damage' => 'required|integer',
            'description' => 'required|string',
            'img_path' => 'sometimes|image',
            'type_id' => 'required|integer|exists:types,id'
        ];
    }
}
