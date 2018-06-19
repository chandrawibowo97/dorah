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
Route::get('/event/map', 'EventsController@map')->name('event_map');
Route::resource('event', 'EventsController');
Route::resource('blog', 'PostsController');
Route::get('/map', 'PagesController@map')->name('map');
Route::get('/help', 'PagesController@help')->name('help');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'User\HomeController@index')->name('home');
    Route::get('/profile', 'User\ProfileController@index')->name('profile');
    Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::group(['prefix' => 'event'], function () {
        Route::get('/', 'Admin\EventController@show')->name('admin_event');
        Route::get('/add', 'Admin\EventController@add');
        Route::post('/add', 'Admin\EventController@add')->name('admin_event_add');
        Route::delete('/delete/{id}', 'Admin\EventController@delete');
        Route::get('/edit/{id}', 'Admin\EventController@edit')->name('admin_event_edit');
        Route::put('/edit/{id}', 'Admin\EventController@edit');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'Admin\PostController@show')->name('admin_post');
        Route::post('/add', 'Admin\PostController@add');
        Route::delete('/delete/{id}', 'Admin\PostController@delete');
        Route::get('/edit/{id}', 'Admin\PostController@edit')->name('admin_post_edit');
        Route::put('/edit/{id}', 'Admin\PostController@edit');
    });

});

Auth::routes();
