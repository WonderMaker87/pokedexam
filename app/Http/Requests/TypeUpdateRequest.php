<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:types,name,'.$this->route('type')->id,
            'color' => 'required|string|max:255|unique:types,color,'.$this->route('type')->id,
            'img_path' => 'required|image|unique:types,color,'.$this->route('type')->id
        ];
    }
}
