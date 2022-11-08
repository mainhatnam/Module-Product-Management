<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
class PhoneRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        if($this->name){
            $this->merge([
                'slug' =>  $this->slug = Str::slug($this->name)
            ]);
        }      
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
      if($this->method()=='PUT'){
        return [
            'name' => 'sometimes|required|max:255',
            'price'=>'sometimes|required|numeric',
            'slug'=>['sometimes','required',Rule::unique('phones', 'slug')->ignore($this->phone->id),],
            'img_tamp'=>['sometimes','required',File::image()->max(1024 * 1024)],
            'imgs_tamp.*'=>['sometimes','required',File::image()->max(1024 * 1024)],
            'category_id'=>'sometimes|required|exists:App\Models\category,id'
        ];
      }
        return [
            'name' => 'required|max:255',
            'slug'=>'required|unique:phones,slug',
            'price'=>'required|numeric',
            'img_tamp'=>['required',File::image()->max(1024 * 1024)],
            'imgs_tamp.*'=>['required',File::image()->max(1024 * 1024)],
            'category_id'=>'required|exists:App\Models\category,id'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'khong bo trong du lieu',
            'slug.unique'=>'slug da ton tai',

        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
          'error' => $validator->errors()
        ],400));
    }
}
