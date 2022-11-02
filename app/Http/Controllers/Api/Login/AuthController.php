<?php

namespace App\Http\Controllers\Api\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Login as LoginRequest;
use Illuminate\Http\Response;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function Login(LoginRequest $LoginRequest){
        if(Auth::attempt($LoginRequest->all())){
            $user = User::where('email', $LoginRequest->email)->first();
            //$tokenResult = $user->createToken()->plainTextToken;
            $tokenResult = $user->createToken('Be-Nem', ['Nem-kute'])->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        }else{
            return response()->json([
                'status_code' => 401,
                'message' => 'login is failed'
            ]);
        }
    }
}
