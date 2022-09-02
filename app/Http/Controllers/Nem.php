<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banh;
class Nem extends Controller
{
    //
    public function index(){
        $coke = Banh::all();
        return json_decode($coke);
    }
}
