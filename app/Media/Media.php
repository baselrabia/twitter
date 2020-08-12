<?php

namespace App\Media;

use App\Media\MimeTypes;
use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    public function type()
    {
        return MimeTypes::type($this->mime_type);
    }
}