<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [];

    public function scopeParent(Builder $builder)
    {
       return $builder->whereNull('parent_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function originalTweet()
    {
        return $this->hasOne(Tweet::class ,'id','original_tweet_id' );
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function retweets()
    {
        return $this->hasMany(Tweet::class , 'original_tweet_id');
    }

    public function retweetedTweet()
    {
        return $this->hasOne(Tweet::class, 'original_tweet_id' ,'id');
    }

    public function media()
    {
        return $this->hasMany(TweetMedia::class);
    }

    public function replies()
    {
        return $this->hasMany(Tweet::class, 'parent_id' );
    }
}
