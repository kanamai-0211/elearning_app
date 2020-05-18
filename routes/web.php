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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/list','HomeController@list')->name('users.list');
Route::get('users/{id}','HomeController@show')->name('users.show');

Route::get('/user/{id}/edit','HomeController@edit')->name('profile.edit');
<<<<<<< Updated upstream
Route::post('/user/{id}/update','HomeController@editprofile_update')->name('profile.update');
=======
Route::post('/user/{id}/update','HomeController@update')->name('profile.update');

Route::get('/user/{id}/follow','UserController@follow')->name('users.follow');
Route::get('/user/{id}/unfollow','UserController@unfollow')->name('users.unfollow');

Route::get('/users/{id}/following','UserController@following')->name('users.following');
Route::get('/users/{id}/followers','UserController@followers')->name('users.followers');
>>>>>>> Stashed changes
