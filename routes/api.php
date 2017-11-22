<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use \App\Http\Controllers\UsersController;

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
$middleware = 'auth:api';
//Route::get('/user', function (Request $request) {
//	return $request->user();
//})->middleware($middleware);
Route::get('user', 'UsersController@show')->middleware($middleware);
Route::put('user', 'UsersController@update')->middleware($middleware);

Route::get('resume', 'ResumeController@show')->middleware($middleware);
Route::put('resume', 'ResumeController@update')->middleware($middleware);
Route::post('resume', 'ResumeController@store')->middleware($middleware);
//Route::middleware($middleware)->put('/user/{user}', function (Request $request) {
//
//});
