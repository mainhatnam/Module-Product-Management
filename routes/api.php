<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Product;
use App\Http\Controllers\Api\Category;
use App\Http\Controllers\Api\controllerUser;

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

Route::prefix('Product')->controller(Product::class)->name('Product.')->group(function (){
    Route::get('show','ShowProduct')->name('show');
    Route::get('search/{name}','NameProduct');
});

Route::prefix('Category')->name('Category.')->group(function (){
    Route::post('add',[Category::class,'AddCategory'])->name('add');
    Route::get('show/{categorys:name}',[Category::class,'show'])->name('show');
});

Route::prefix('user')->name('user.')->group(function (){
    Route::get('show/{id}',[controllerUser::class,'ShowUser'])->name('show');
    Route::get('show-email/{email}',[controllerUser::class,'ShowEmail'])->name('showemail');
    Route::post('adduser',[controllerUser::class,'addUser'])->name('adduser');
});