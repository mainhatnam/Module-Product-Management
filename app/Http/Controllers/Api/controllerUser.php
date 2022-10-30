<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequset;
use Illuminate\Http\Request;
use App\Models\User;


class controllerUser extends Controller
{
    //
    public function ShowUser($id){
        return User::find($id);
    }
    public function addUser(UserRequset $UserRequset){
        return User::create($UserRequset->all());
    }
    public function ShowEmail($email){
        return User::GetEmailUser($email)->get();
    }
    
}
