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
    return view('starting_page');
});

Route::get('/info', function () {
    return view('info');
});

Route::resource('user', 'UserController');
Route::resource('hobby', 'HobbyController');
Route::resource('tag', 'TagController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hobby/tag/{tag_id}', 'HobbyTagController@getFilteredHobbies')->name('hobby_tag');
