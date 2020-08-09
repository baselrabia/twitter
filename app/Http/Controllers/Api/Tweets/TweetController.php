<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Requests\Tweets\TweetStoreRequest;
class TweetController extends Controller
{
    public function __constract()
    {
       $this->middleware('auth:sanctum')->only(['store']);
    }

    public function store(TweetStoreRequest $request)
    {
        $request->user()->tweets()->create($request->only('body'));
    }
}
