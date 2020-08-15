<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\tweetCollection;

class TimelineController extends Controller
{
    public function __constract()
    {
       $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {

        $tweets = $request->user()
            ->tweetsFromFollowing()
            ->parent()
            ->latest()
            ->with([
                'user',
                'likes',
                'retweets',
                'replies',
                'entities',
                'media.baseMedia',
                'originalTweet.user',
                'originalTweet.likes',
                'originalTweet.retweets',
                'originalTweet.media.baseMedia',
            ])
            ->paginate(3);

        return new TweetCollection($tweets);
    }
}
