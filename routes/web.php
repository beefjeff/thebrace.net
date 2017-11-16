<?php

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

use App\Messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
//	return view('welcome');
	return redirect('resume');
});



Route::get('blog', function(){
	return view('blog');
})->name('blog');
Route::get('resume', function(){
	return view('resume');
})->name('resume');
Route::get('admin', function(){
	return view('layouts.admin');

})->middleware('auth')->name('admin');




Route::resource('messages', 'MessagesController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{catchall?}', function () {
	return response()->view('layouts.admin');
})->where('catchall', '(.*)');