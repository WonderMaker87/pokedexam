<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttackUpdateRequest extends FormRequest
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
