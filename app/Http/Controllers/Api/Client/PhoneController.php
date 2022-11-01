<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phones;
use App\Models\category;
use App\Http\Resources\PhoneResource;

class PhoneController extends Controller
{
    /**
     * show all phone and paginate,sort
     * @return Json
     */
    public function ShowAll()
    {
        $PhoneResource = PhoneResource::collection(
            Phones::orderBy('id', 'desc')
            ->paginate(2))
            ->response()
            ->getData(true);
        return $this->sentResponse($PhoneResource);
    }

    /**
     * show phone by category
     * @return Json
     */
    public function PhoneByCategory(category $category)
    {
        $PhoneResource = PhoneResource::collection(
            Phones::where('category_id', $category->id)->get()
        );
        return $this->sentResponse($PhoneResource);
    }
    /**
     * show phone by id
     * @return Json
     */
    public function PhoneById(Phones $phones)
    {
        return $this->sentResponse(new PhoneResource(Phones::find($phones->id)));
    }

}
