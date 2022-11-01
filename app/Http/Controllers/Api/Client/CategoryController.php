<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Show all Category on Client
     * @return Json
     */
    public function ShowAllCategory(){
        $categoryResource = CategoryResource::collection(category::all()->sortByDesc('id'));
        return $this->sentResponse($categoryResource);
    }
    /**
     * Show all Category and sort desc by id
     * @return Json
     */
    public function PhoneByCategory(){
        $category = category::with(['phones'=>function($query){
            $query->orderBy('id', 'desc');
        }])->get();
        $categoryResource = CategoryResource::collection($category);
        return $this->sentResponse($categoryResource);;
    }
}
