<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;

class PhoneResource extends JsonResource
{
    //public static $wrap = 'Phones';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'slug'=>$this->slug,
            'price'=>$this->price,
            'img'=>$this->img,
            'imgs'=>$this->imgs,
            'category_id'=>$this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'Category' => CategoryResource::collection($this->whenLoaded('Category'))
        ];
    }
}
