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
use App\Post;
use App\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
//	return view('welcome');
	return redirect('resume');
});



Route::get('blog', function(){
	$posts = Post::with('user')->get();
	$posts = $posts->sortBy(function($post){
		return $post->created_at;
	});
//	dd($posts);
	return view('blog', compact('posts'));
})->name('blog');

Route::get('resume', function(){
	$resume = Resume::whereUserId(1)->get();
//	dd($resume);
	return view('resume',compact('resume'));
})->name('resume');

Route::get('admin', function(){
//	dd($user_data);

	return view('admin',compact('user','resume'));


})->middleware('auth')->name('admin');

Route::get('test', function(){
	return view('test');
});

//Route::get('/redirect', function () {
//	$query = http_build_query([
//		'client_id' => '3',
//		'redirect_uri' => 'http://consumer.dev/callback',
//		'response_type' => 'code',
//		'scope' => '',
//	]);
//
//	return redirect('http://passport.dev/oauth/authorize?'.$query);
//});
//Route::get('/callback', function (Request $request) {
//	$http = new GuzzleHttp\Client;
//
//	$response = $http->post('http://passport.dev/oauth/token', [
//		'form_params' => [
//			'grant_type' => 'authorization_code',
//			'client_id' => '3',
//			'client_secret' => '3TfJGj4rrvOQvjZkI8dDqx78ouH99F2DuIMKHoKH',
//			'redirect_uri' => 'http://consumer.dev/callback',
//			'code' => $request->code,
//		],
//	]);
//
//	return json_decode((string) $response->getBody(), true);
//});


Route::resource('messages', 'MessagesController');
Route::resource('posts', 'PostController');
Auth::routes();


// todo remove this man-in-the-middle
Route::get('/home', function(){
	return redirect('admin');
})->name('home');


// vue-router catch
Route::get('/admin/{catchall?}', function () {
	$user_data = Auth::user();
	$user_data->load('resume');
//	dd($user_data->resume);
	return view('admin', compact('user_data'));

})->where('catchall', '(.*)');