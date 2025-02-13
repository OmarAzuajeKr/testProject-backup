<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
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
            'tittle' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'tittle.required' => 'El título es obligatorio',
            'description.required' => 'La descripción es obligatoria',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'El archivo debe ser una imagen de tipo: png, jpg, jpeg, gif, svg',
            'image.max' => 'El archivo debe ser menor a 2MB',
        ];
    }
}