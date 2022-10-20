<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banh;
use DB;

class Product extends Controller
{
    //
    
    public function ShowProduct(){
        $Banh = Banh::all()->first();
        return $Banh;
    }
    public function NameProduct($name){
        $banh = Banh::Where('tenbanh','Like','%'.$name.'%')->get();
        return $banh;
    }
}
