<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetRetweetsWereUpdated;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Tweet;
use App\TweetMedia;
use App\Tweets\TweetType;
use Illuminate\Http\Request;

class TweetReplyController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth:sanctum');
    }


    public function store(Tweet $tweet, Request $request)
    {
        $reply = $request->user()->tweets()->create([
            'type' => TweetType::TWEET,
            'body' => $request->body,
            'parent_id' => $tweet->id
        ]);

        foreach ($request->media as $id) {
            $reply->media()->save(TweetMedia::find($id));
        }
        // broadcast(new TweetWasCreated($reply));
        // broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }
}
