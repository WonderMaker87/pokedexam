<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:types|max:255',
            'color' => 'required|unique:types|max:255',
            'img_path' => 'required|unique:types|image'
        ];
    }
}
