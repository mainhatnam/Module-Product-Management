<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class controllerUser extends Controller
{
    //
    public function ShowUser($id){
        return User::find($id);
    }
}
