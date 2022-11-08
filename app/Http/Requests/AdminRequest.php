<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'is_admin'=>'required|numeric|min:0|max:1'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'khong bo trong email',
            'password.required'=>'khong bo trong password',
            'email.email'=>'khong dung dinh dang email',
            'email.unique'=>'email da ton tai'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
          'error' => $validator->errors()
        ],400));
    }
}
