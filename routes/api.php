<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Client\CategoryController as ClientCategory;
use App\Http\Controllers\Api\Client\PhoneController as ClientPhone;
use App\Http\Controllers\Api\Client\LoginController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\Client\AuthController;
use App\Http\Controllers\Api\Client\RegisterController;
use App\Http\Controllers\Api\Phone\PhoneController as ServerPhone;
use App\Http\Controllers\Api\Category\CategoryController as ServerCategory;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('login', function () {
    return response()->json([
        'massage'=>'please login'
    ],400);
})->name('login');

Route::prefix('Client')->name('Client.')->group(function (){
    Route::prefix('Category')->name('Category.')->group(function (){
        Route::get('Show',[ClientCategory::class,'ShowAllCategory'])->name('show');
        Route::get('ShowByPhone',[ClientCategory::class,'PhoneByCategory'])->name('showbyphone');
    });
    Route::prefix('Phone')->name('Phone.')->group(function (){
        Route::get('Show',[ClientPhone::class,'ShowAll'])->name('show');
        Route::get('Category/{category:slug}',[ClientPhone::class,'PhoneByCategory'])->name('category');
        Route::get('Info/{phones:slug}',[ClientPhone::class,'PhoneById'])->name('info');
        Route::get('Search',[ClientPhone::class,'FindNamePhone'])->name('search');
    });
});
Route::prefix('login')->name('login.')->middleware('checkLogin')-> group(function (){
    Route::post('authLogin',[LoginController::class,'Login'])->name('authLogin');
    Route::post('authRegister',[RegisterController::class,'register'])->name('authRegister');
});
Route::prefix('Auth')->name('Auth.')->middleware(['auth:api'])->group(function (){
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('me',[AuthController::class,'me'])->name('me');
    Route::get('refresh',[AuthController::class,'refresh'])->name('refresh');
});
Route::prefix('Admin')->name('Admin.')->middleware(['auth:api','checkadmin'])->group(function (){
    Route::prefix('User')->name('User.')->group(function (){
        Route::get('index',[UserController::class,'index'])->name('index');     
        Route::post('store',[UserController::class,'store'])->name('store');   
        Route::get('show/{User:id}',[UserController::class,'show'])->name('show');   
        Route::put('update/{User:id}',[UserController::class,'update'])->name('update');
        Route::delete('destroy/{user:id}',[UserController::class,'destroy'])->name('destroy');
    });
    Route::prefix('Phone')->name('Phone.')->group(function (){
        Route::get('index',[ServerPhone::class,'index'])->name('index');  
        Route::post('store',[ServerPhone::class,'store'])->name('store');   
        Route::get('show/{phones:slug}',[ServerPhone::class,'show'])->name('show'); 
        Route::put('update/{phone:slug}',[ServerPhone::class,'update'])->name('update');  
        Route::delete('destroy/{phone:slug}',[ServerPhone::class,'destroy'])->name('destroy');
    });
    Route::prefix('Category')->name('Category.')->group(function (){
        Route::get('index',[ServerCategory::class,'index'])->name('index');  
        Route::post('store',[ServerCategory::class,'store'])->name('store');   
        Route::get('show/{category:slug}',[ServerCategory::class,'show'])->name('show'); 
        Route::put('update/{category:slug}',[ServerCategory::class,'update'])->name('update');  
        Route::delete('destroy/{category:slug}',[ServerCategory::class,'destroy'])->name('destroy');
    });

});

