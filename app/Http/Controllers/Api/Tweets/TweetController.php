<?php

namespace App\Http\Controllers\Api\Tweets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Http\Resources\TweetCollection;
use App\Notifications\Tweets\TweetMentionedIn;
use App\Tweet;
use App\TweetMedia;
use App\Tweets\TweetType;

class TweetController extends Controller
{
    public function __constract()
    {
       $this->middleware('auth:sanctum')->only(['store']);
    }

    public function index(Request $request)
    {
        $tweets = Tweet::with([
                'user',
                'likes',
                'retweets',
                'replies',
                'media.baseMedia',
                'originalTweet.user',
                'originalTweet.likes',
                'originalTweet.retweets',
                'originalTweet.media.baseMedia',
            ])
            ->find(explode(',',$request->ids));

            return new TweetCollection($tweets);
    }

    public function store(TweetStoreRequest $request)
    {
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'),['type'=>TweetType::TWEET]));

        foreach ($request->media as $id ) {
            $tweet->media()->save(TweetMedia::find($id));
        }

        foreach ($tweet->mentions->users() as $user) {
            if ($request->user()->id !== $user->id) {
                $user->notify(new TweetMentionedIn($request->user(), $tweet));
            }
        }

        broadcast(new TweetWasCreated($tweet));

    }
}
