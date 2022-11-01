<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\category as categorys;
class Category extends Controller
{
    //
    public function AddCategory(CategoryRequest $request,categorys $category){     
        return $category->find(1);
    }
    public function show(categorys $categorys){
        //find id
        return new CategoryResource($categorys);
    }
    public function index(){
        return CategoryResource::collection(categorys::get());
    }
}
