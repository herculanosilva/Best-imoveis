<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileUpdateRequest extends FormRequest
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
            'currentPassword' => ['bail','required','min:8','max:20', function($attribute,$value,$fail){
                if (! Hash::check($value, Auth::user()->password)) {
                    return $fail("A senha atual está incorreta");
                }
            }],
            'newPassword' => "bail|required|min:8|max:20",
            'newPassword_confirmation' => "bail|required|confirmed"
        ];
    }

    public function attributes()
    {
        return [
            'currentPassword' => 'Senha atual',
            'newPassword' => 'Nova senha',
            'newPassword_confirmation' => 'Confirmação de senha',
        ];
    }

    public function messages()
    {
        return [
            'newPassword.confirmed' => 'teste.',
        ];
    }
}


