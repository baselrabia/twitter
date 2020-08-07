<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\tweetCollection;

class TimelineController extends Controller
{

    public function index(Request $request)
    {

        $tweets = $request->user()
                        ->tweetsFromFollowing()
                        ->paginate(5);

        return new tweetCollection($tweets);

    }
}