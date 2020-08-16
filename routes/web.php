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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/notifications', 'Notifications\NotificationController@index');

Route::get('/tweets/{tweet}', 'Tweets\TweetController@show');

Route::get('/api/timeline', 'Api\Timeline\TimelineController@index');

// Route::get('/notifications', 'Api\Notifications\NotificationController@index');
