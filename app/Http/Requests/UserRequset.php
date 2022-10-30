<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
class UserRequset extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'khong bo trong ten tai khoan',
            'email.required'=>'khong bo trong email',
            'password.required'=>'khong bo trong password',
            'email.email'=>'khong dung dinh dang email',
            'email.unique'=>'email da ton tai'
        ];
    }
    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //        $validator->errors()
    //     ],400));
    // }
 
  
    
}
