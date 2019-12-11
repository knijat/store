<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function messages()
    {
        return ['name.required'=>'This field has to be fill !',
            'category'=>'This field has to be fill',
            'price.required'=>'This field has to be fill !',
            'image.required'=>'This field has to be fill !',
            'name.min'=>'You need to fill at least 2 character',
            'price'=>'You need to fill at least one number'];


    }
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
        return ['name'=>'required|min:2|regex:/^[a-zA-Z]+$/u',
                'price'=>'required|min:1',
                'quantity'=>'required|min:1',
                'description'=>'required|min:1',
                'category'=>'required',
                'image'=>'required|min:1'];
    }
}
