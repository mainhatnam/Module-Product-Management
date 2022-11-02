<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Category;
use App\Http\Controllers\api\controllerUser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('test', function () {
    return view('hello');
});
// Route::prefix('Category')->name('Category.')->group(function (){
//     Route::post('add',[Category::class,'AddCategory'])->name('add');
// });
// Route::prefix('user')->name('user.')->group(function (){
//     Route::get('show/{id}',[controllerUser::class,'ShowUser'])->name('show');
//     Route::post('adduser',[controllerUser::class,'addUser'])->name('adduser');
// });