<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Channel extends Model implements HasMedia
{


    use HasFactory, InteractsWithMedia;


    /**
     * Relationships whit che User class
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Retrive image from the media library
     */
    public function image(){
        if($this->media->first()){
            return $this->media->first()->getUrl('thumb');
        }

        return null;
    }

    /**
     * Shrink the image to a thumbnail
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(100)->height(100);
    }

}
