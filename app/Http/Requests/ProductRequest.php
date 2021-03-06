<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use CrazyCommerce\Admin\Models\ProductAttribute;

class ProductRequest extends Request
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


        if(count($this->request->get('website_id')) <= 0 ) {
            $validateArray ['website_id[]'] = 'required';
        }

        $productAttributes = ProductAttribute::all();

        foreach($productAttributes as $productAttribute) {
            $validateArray [$productAttribute->identifier] = $productAttribute->validation;
        }

        return $validateArray;

        //return [
        //      'title' => 'required|max:255',
        //      'identifier' => 'required|max:255|unique:product_attributes,id,' . $this->get('id'),
        //      'type' => 'required',
        //      'user.email' => 'required|email|unique:users,email,' . $user->id,
        //];


    }
}
