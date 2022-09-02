<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\test2 as la;
use App\Http\Controllers\Api\test1;
use App\Http\Controllers\Nem;
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
});
Route::get('hello', function () {
    return view('hello');
});
Route::get('apiNem',[la::class, 'index']);
Route::get('apiNem2',[test1::class, 'index']);
Route::get('apiNem3',[Nem::class, 'index']);