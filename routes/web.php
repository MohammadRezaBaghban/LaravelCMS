<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::resource('posts', 'PostsController');
Route::resource('editor', 'CKEditorController');

Route::get('/', 'PagesController@index' );
Route::get('/about', 'PagesController@about' );
Route::get('/services', 'PagesController@services' );
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts/pdf/{id}','PostsController@get_postPdf');
Route::post('profile','HomeController@update_avatar');
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destroy');

Route::get('/picture', function()
{
    $img = Image::make('foo.jpg')->resize(300, 200);

    $img->save('bar.jpg', 60);

    return $img->response('jpg');
});

Route::prefix('admin')->group(function(){
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
    });