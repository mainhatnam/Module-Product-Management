<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
class AuthController extends Controller
{
    public function logout() {}
    public function refresh() {}
    public function me() {}
    public function changePassWord(Request $request) {}
}
