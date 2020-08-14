<?php

namespace App\Http\Controllers\Api\Tweets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Http\Resources\TweetCollection;
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
        return new TweetCollection(Tweet::find(explode(',',$request->ids)));
    }

    public function store(TweetStoreRequest $request)
    {
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'),['type'=>TweetType::TWEET]));

        foreach ($request->media as $id ) {
            $tweet->media()->save(TweetMedia::find($id));
        }

        broadcast(new TweetWasCreated($tweet));

    }
}
