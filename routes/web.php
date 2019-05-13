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
    return view('welcome');
});

Route::get('/notes', function () {
    return view('notes');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/achievements', function () {
    return view('achievements');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::any('/wechat', 'WeChatController@serve');

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
    });
});

Route::group(['middleware' => 'admin.permission:allow,administrator,editor'], function () {
    Route::get('/admin/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/admin/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});



// language setting
Route::get('/{locale}', function ($locale) {
	session(['my_locale' => $locale]);  	
	return redirect()->back();
});


