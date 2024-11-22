<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'description' => 'required|max:300'
            //
        ];
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo Nombre del bar es obligatorio',
            'name.min' => 'El campo Nombre del bar debe tener al menos tres letras',

            'description' => [
                'required' => 'El campo Descripción es obligatorio',
                'max' => 'El campo Descripción no debe tener más de 300 caracteres'
            ]
        ];
    }
}
