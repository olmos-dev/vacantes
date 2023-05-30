<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacanteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => ['required','min:3'],
            'categoria' => ['required'],
            'experiencia' => ['required'],
            'ubicacion' => ['required'],
            'salario' => ['required'],
            'descripcion' => ['required'],
            'imagen' => ['required'],
            'skills' => ['required']

        ];
    }

    public function messages(){
        return[
            'skills.required' => 'El campo habilidades y conocimientos es obligatorio'
        ];
    }
}
