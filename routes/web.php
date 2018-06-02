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

Route::get('/', 'PagesController@index');

Route::get('/event', 'EventsController@event');
Route::get('/eventdetail', 'EventsController@eventDetail'); //Temporary, seharusnya /event/{id}
Route::get('/addevent', 'EventsController@addEvent'); //temporary

Route::get('/map', 'PagesController@map');
Route::get('/help', 'PagesController@help');

Route::get('/home', 'PagesController@home');
Route::get('/profile', 'PagesController@profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
