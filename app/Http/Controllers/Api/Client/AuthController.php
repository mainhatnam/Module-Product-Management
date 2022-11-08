<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
class AuthController extends Controller
{
    public function logout() {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh() {
        return $this->createNewToken(auth('api')->refresh());
    }
    public function me() {
        return $this->sentResponse(JWTAuth::user());
    }
}
