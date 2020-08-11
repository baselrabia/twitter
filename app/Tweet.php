<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'body','type',
    ];

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
}
