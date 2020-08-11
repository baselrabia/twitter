<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet,Request $request)
    {

        if ($request->user()->hasLiked($tweet)){
            return response(null,409); // conflict error
        }
        $request->user()->likes()->create([
            'tweet_id'=> $tweet->id
            ]);
    }

    public function destroy(Tweet $tweet, Request $request)
    {
        $request->user()->likes()->where([
            'tweet_id' => $tweet->id
            ])->first()->delete();

    }
}
