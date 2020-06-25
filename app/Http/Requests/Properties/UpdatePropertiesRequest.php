<?php

namespace App\Http\Requests\Properties;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertiesRequest extends FormRequest
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
            'image' => 'nullable',
            'name' => 'nullable',
            'description' => 'nullable',
            'city' => 'nullable',
            'location' => 'nullable',
            'precio' => 'nullable'
        ];
    }
}
