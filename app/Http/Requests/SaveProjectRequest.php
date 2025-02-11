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
        ];
    }

    public function messages()
    {
        return [
            'tittle.required' => 'El título es obligatorio',
            'description.required' => 'La descripción es obligatoria',
        ];
    }
}