<?php

namespace App;

use App\Media\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class TweetMedia extends Model implements HasMedia
{
    use HasMediaTrait;

    public function baseMedia()
    {
        return $this->belongsTo(Media::class,'media_id');
    }


}
