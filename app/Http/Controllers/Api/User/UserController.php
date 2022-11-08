<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateUser;
use JWTAuth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::where('id','!=',JWTAuth::user()->id)->get();
        return $this->sentResponse(UserResource::collection($user));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $UserRequset)
    {
        $UserRequset['password']=bcrypt($UserRequset['password']);
        $userResource =User::create($UserRequset->all());
        return $this->sentResponse(new UserResource($userResource));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        return $this->sentResponse(new UserResource($User));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $UpdateUser,User $User)
    {      
        $User->update($UpdateUser->all());
        return $this->sentResponse(new UserResource($User));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::user()->id) {
          return response()->json([
            'Massage'=>'Bad Request'
           ],400);
        }
        $user->delete();
        return response()->json([
            'Massage'=>'successful delete',
            'userDeleted'=>$user
        ],200);
    }
}
