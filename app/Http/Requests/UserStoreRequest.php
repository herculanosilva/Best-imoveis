<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'bail|required|min:3|max:255',
            'email' => 'bail|required|email|unique:users',
            'type' => 'bail|required',
            'password' => 'bail|required|min:8|max:20',
        ];
    }

    /**
    * Customizing the field names in the error message
    */
    public function attributes()
    {
        return [
            'type' => 'tipo',
        ];
    }

    public function messages()
    {
        return
        [
            'email.unique' => 'Esse email já está em uso.'
        ];
    }


}
