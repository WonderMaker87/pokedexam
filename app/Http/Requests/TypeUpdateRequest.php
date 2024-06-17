<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:types,name,'.$this->route('type')->id,
            'color' => 'required|string|max:255|unique:types,color,'.$this->route('type')->id,
            'img_path' => 'required|image|unique:types,color,'.$this->route('type')->id
        ];
    }
}
