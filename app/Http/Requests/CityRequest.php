<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            #parametros do unique = nome da tabela, nome do campo na tabela, o que vai ser ignorado (caso seja o mesmo id)
            'name' => "bail|required|min:3|max:100|unique:cities,name,$this->city"
        ];
    }
}
