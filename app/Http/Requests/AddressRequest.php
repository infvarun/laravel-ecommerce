<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddressRequest extends Request
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address1' => 'required|max:255',
            'area' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'phone' => 'required|max:255',
        ];
    }
}
