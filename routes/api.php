<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/timeline', 'Api\Timeline\TimelineController@index');

Route::get('/notifications', 'Api\Notifications\NotificationController@index');

Route::post('/tweets', 'Api\Tweets\TweetController@store');
Route::get('/tweets', 'Api\Tweets\TweetController@index');

Route::get('/tweets/{tweet}', 'Api\Tweets\TweetController@show');

Route::post('/tweets/{tweet}/replies', 'Api\Tweets\TweetReplyController@store');

Route::post('/tweets/{tweet}/likes', 'Api\Tweets\TweetLikeController@store');
Route::delete('/tweets/{tweet}/likes', 'Api\Tweets\TweetLikeController@destroy');

Route::post('/tweets/{tweet}/retweets', 'Api\Tweets\TweetRetweetController@store');
Route::delete('/tweets/{tweet}/retweets', 'Api\Tweets\TweetRetweetController@destroy');

Route::post('/media', 'Api\Media\MediaController@store');
Route::get('/media/types', 'Api\Media\MediaTypesController@index');

Route::post('/tweets/{tweet}/quotes', 'Api\Tweets\TweetQuoteController@store');
