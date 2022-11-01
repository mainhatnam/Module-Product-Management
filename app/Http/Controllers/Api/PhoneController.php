<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PhoneResource;
use App\Models\Phones;

use function PHPSTORM_META\type;

class PhoneController extends Controller
{
    
    public function Show(){
        $phoneResouce = PhoneResource::collection(Phones::paginate(2))->response()->getData(true);
        return $this->sentResponse($phoneResouce);
    }
    
}
