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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::post('follow/{user}', 'FollowController@store');

Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');

Route::get('/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/{user}', 'ProfilesController@index')->name('profile.show');
Route::patch('/{user}', 'ProfilesController@update')->name('profile.show');