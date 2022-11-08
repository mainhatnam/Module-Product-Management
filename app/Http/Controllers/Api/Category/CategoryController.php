<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryResource = category::all();
        return $this->sentResponse(CategoryResource::collection($categoryResource));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $CategoryRequest)
    {
        $CategoryResource = category::create($CategoryRequest->all());
        return $this->sentResponse(new CategoryResource($CategoryResource));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return $this->sentResponse(new CategoryResource($category));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $CategoryRequest, category $category)
    {
        $category->update($CategoryRequest->all());
        return $this->sentResponse(new CategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        try {
            $category->delete();      
           } catch (\Throwable $th) {
              return response()->json([
               'message'=>'please check data again'
              ],400);
           }
           return response()->json([
               'massage'=>'successful delete',
               'categoryDeleted'=>$category
           ],200);
    }
}
