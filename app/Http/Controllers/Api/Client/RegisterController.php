<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Requests\UserRequset;
use App\Models\User;
class RegisterController extends Controller
{
    public function register(UserRequset $UserRequset){
        $UserRequset['password']=bcrypt($UserRequset['password']);
       if(User::create($UserRequset->all())){
        return $this->sentResponse('true');
       };
       return $this->sentResponse('flase');
    }
}
