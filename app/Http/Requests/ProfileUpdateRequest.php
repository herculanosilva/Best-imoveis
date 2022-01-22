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
                    return $fail("A senha está incorreta");
                }
            }],
            'newPassword' => "bail|required|confirmed|min:8|max:20",
        ];
    }

    public function attributes()
    {
        return [
            'currentPassword' => 'senha atual',
            'newPassword' => 'nova senha',
        ];
    }

    public function messages()
    {
        return [
            'newPassword.confirmed' => 'A confirmação da senha não confere.',
        ];
    }
}
