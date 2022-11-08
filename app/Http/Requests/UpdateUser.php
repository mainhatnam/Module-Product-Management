<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class UpdateUser extends FormRequest
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
            'name' => 'sometimes|required|max:255',
            'email' => [
                'sometimes', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($this->User->id),],
            'is_admin'=>'sometimes|required|numeric|min:0|max:1'
        ];  
    }
    public function messages()
    {
        return [
            'name.required' => 'khong bo trong ten tai khoan',
            'email.required'=>'khong bo trong email',
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
