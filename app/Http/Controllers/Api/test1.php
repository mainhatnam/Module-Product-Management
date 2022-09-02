<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banh;
class test1 extends Controller
{
    //
    public function index()
    {
        $coke = Banh::all();
        return $coke;
    }
}
