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

Route::get('/', function () {
	return redirect('resume');
});
Route::get('blog', function(){
	return view('blog');
})->name('blog');
Route::get('resume', function(){
	return view('resume');
})->name('resume');
Route::resource('messages', 'MessageController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
