<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PhoneController;
use App\Http\Controllers\Api\Category;
use App\Http\Controllers\Api\controllerUser;
use App\Http\Controllers\Api\Client\CategoryController as ClientCategory;
use App\Http\Controllers\Api\Client\PhoneController as ClientPhone;

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

Route::prefix('Phone')->controller(PhoneController::class)->name('Phone.')->group(function (){
    Route::get('show','Show')->name('show');

});

Route::prefix('Category')->name('Category.')->group(function (){
    Route::post('add',[Category::class,'AddCategory'])->name('add');
    Route::get('show/{categorys:id}',[Category::class,'show'])->name('show');
    Route::get('index',[Category::class,'index'])->name('index');
});

Route::prefix('user')->name('user.')->group(function (){
    Route::get('show',[controllerUser::class,'ShowUser'])->name('show');
    Route::get('show-email/{email}',[controllerUser::class,'ShowEmail'])->name('showemail');
    Route::post('adduser',[controllerUser::class,'addUser'])->name('adduser');
});
Route::prefix('Client')->name('Client.')->group(function (){
    Route::prefix('Category')->name('Category.')->group(function (){
        Route::get('Show',[ClientCategory::class,'ShowAllCategory'])->name('show');
        Route::get('ShowByPhone',[ClientCategory::class,'PhoneByCategory'])->name('showbyphone');
    });
    Route::prefix('Phone')->name('Phone.')->group(function (){
        Route::get('Show',[ClientPhone::class,'ShowAll'])->name('show');
        Route::get('Category/{category:slug}',[ClientPhone::class,'PhoneByCategory'])->name('category');
        Route::get('Info/{phones:slug}',[ClientPhone::class,'PhoneById'])->name('info');
    });


});

