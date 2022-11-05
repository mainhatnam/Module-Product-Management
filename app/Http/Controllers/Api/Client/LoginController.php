<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Http\Requests\Login as LoginRequest;

class LoginController extends Controller
{
    public function Login(LoginRequest $LoginRequest)
    {
        if (!$token = JWTAuth::attempt($LoginRequest->all())) {
            return response()->json([
                'status_code' => 401,
                'message' => 'login is failed'
            ]);
        }
        return $this->createNewToken($token);
    }
    protected function createNewToken($token)
    {
        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60,
                'user' => JWTAuth::user()
            ]
        ]);
    }
}
