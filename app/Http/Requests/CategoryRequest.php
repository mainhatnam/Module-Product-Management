<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class CategoryRequest extends FormRequest
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
    public function rules()
    {
        if($this->method()=='PUT'){
            return [
                'name' => 'sometimes|required',
                'slug'=>['sometimes','required',Rule::unique('category', 'slug')->ignore($this->category->id),],
            ];
          }
        return [
            'name' => 'required',
            'slug'=>'required|unique:category,slug',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
           $validator->errors()
        ],401));

    }

}
