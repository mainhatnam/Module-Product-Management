<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tenloaibanh' => 'required'
        ];
    }
    public function messages()
    {
    return [
        'tenloaibanh.required' => 'khong bo trong ten loai'
    ];
    }
    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
           $validator->errors()
        ],401));

    }

}
