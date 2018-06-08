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


Route::get('/', 'PagesController@index')->name('index');
Route::resource('event', 'EventsController');
Route::resource('blog', 'PostsController');
Route::get('/map', 'PagesController@map')->name('map');
Route::get('/help', 'PagesController@help')->name('help');

// User only
Route::get('/home', 'User\HomeController@index')->name('home');
Route::get('/profile', 'User\ProfileController@index')->name('profile');
Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');

Auth::routes();