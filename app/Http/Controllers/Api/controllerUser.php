<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequset;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;


class controllerUser extends Controller
{
    //
    public function ShowUser(){
        $user = User::paginate(5);
        return $user;
        // UserResource::collection($user)
    }
    public function addUser(UserRequset $UserRequset){
        $UserRequset['password']=bcrypt($UserRequset['password']);
        return User::create($UserRequset->all());
    }
    public function ShowEmail($email){
        return User::GetEmailUser($email)->get();
    }
    
}
