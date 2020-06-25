<?php

namespace App\Http\Requests\Servicios;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiciosRequest extends FormRequest
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
          'icon' => 'required',
          'title' => 'required|unique:servicios',
          'contenido' => 'nullable'
        ];
    }
}
