<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetRepliesWereUpdated;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Notifications\Tweets\TweetRepliedTo;
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

        if ($request->user()->id !== $tweet->user_id) {
            $tweet->user->notify(new TweetRepliedTo($request->user(), $reply));
        }

        broadcast(new TweetRepliesWereUpdated($tweet));
    }
}
