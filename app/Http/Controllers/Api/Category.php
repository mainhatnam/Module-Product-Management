<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\loaibanh;
class Category extends Controller
{
    //
    public function AddCategory(CategoryRequest $request){     
        return true;
    }
}
