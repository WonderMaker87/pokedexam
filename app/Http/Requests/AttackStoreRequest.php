<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttackStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:attacks|max:255',
            'damage' => 'required',
            'description' => 'required',
            'img_path' => 'required|image|unique:attacks',
            'type_id' => 'required'
        ];
    }
}
