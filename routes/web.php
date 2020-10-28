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

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


Route::get('/', 'ForumController@index');
Route::get('/forums/{forum}', 'ForumController@show');
Route::post('/forums', 'ForumController@store');


Route::group(['middleware' => 'admin'], function () {
	Route::get('/posts/{post}', 'PostController@show');
	Route::delete('/posts/{post}', 'PostController@destroy');
	Route::post('/posts', 'PostController@store');
});

Route::post('/replies', 'ReplyController@store');
Route::delete('/replies/{reply}', 'ReplyController@destroy')->name('replies.delete');

Route::get('/images/{path}/{attachment}', function ($path, $attachment){
	// Lo siguiente devuelve el Path absoluto de "Storage"
	$storagePath = Storage::disk($path)->getDriver()->getAdapter()->getPathPrefix();
	$imageFilePath = $attachment;

	if(File::exists($imageFilePath)) {
        // return "$imageFilePath";
		return Image::make($imageFilePath)->response();
	}
});


Auth::routes();
