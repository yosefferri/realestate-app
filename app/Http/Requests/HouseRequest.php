<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
{
    public function rules()
    {
        $rules =  [
            'address' => 'required|unique:houses|max:255',
            'typeContract' => 'required',
            'garage' => 'between:1,3'
        ];
        return $rules;
    }

    
}
