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
Route::post('/user/{id}/update','HomeController@editprofile_update')->name('profile.update');

Route::get('/user/{id}/follow','UserController@follow')->name('users.follow');
Route::get('/user/{id}/unfollow','UserController@unfollow')->name('users.unfollow');

Route::get('/users/{id}/following','UserController@following')->name('users.following');
Route::get('/users/{id}/followers','UserController@followers')->name('users.followers');

Route::get('/admin/categories','AdminController@index')->name('admin.categories');
Route::get('/admin/categories/create','AdminController@create')->name('categories.create');
Route::post('admin/categories','AdminController@store')->name('categories.store');

Route::get('/admin/categories/{id}/edit','AdminController@edit')->name('categories.edit');
Route::patch('/admin/categories/{id}/update','AdminController@update')->name('categories.update');
Route::delete('admin/categories/{id}','AdminController@destroy')->name('categories.destroy');
