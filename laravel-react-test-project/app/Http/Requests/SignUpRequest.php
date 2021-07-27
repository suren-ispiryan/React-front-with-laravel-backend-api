<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name'=>'string|required|min:2',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:6|max:15',
            'confirmation'=>'same:password|required|min:6|max:15'
        ];
    }
}
