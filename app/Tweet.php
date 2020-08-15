<?php

namespace App;

use App\Tweets\Entities\EntityExtractor;
use App\Tweets\Entities\EntityType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::created(function (Tweet $tweet){
            $tweet->entities()->createMany(
                (new EntityExtractor($tweet->body))->getAllEntities()
            );
        });

    }

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

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }

    public function mentions()
    {
        return $this->hasMany(Entity::class)
        ->whereType(EntityType::MENTION);
    }
}
