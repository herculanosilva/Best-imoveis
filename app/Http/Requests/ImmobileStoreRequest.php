<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImmobileStoreRequest extends FormRequest
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
            'title' => 'bail|required|min:3|max:100',
            'city_id' => 'bail|required|integer',
            'type_id' => 'bail|required|integer',
            'finality_id' => 'bail|required|integer',
            'price' => 'bail|required|numeric|min:0',
            'room' => 'bail|required|integer|min:0',
            'living_room' => 'bail|required|integer|min:0',
            'ground' => 'bail|required|integer|min:0',
            'bathroom' => 'bail|required|integer|min:0',
            'garage' => 'bail|required|integer|min:0',
            'description' => 'bail|nullable|string',
            'street' => 'bail|required|min:1|max:100',
            'number' => 'bail|required|integer',
            'complement' => 'bail|nullable|string',
            'district' => 'bail|required|min:3|max:50',
            'proximity' => 'bail|nullable|array'
        ];
    }
}
