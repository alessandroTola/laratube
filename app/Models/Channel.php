<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
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
     * Check if the author is authorized
    */
    public function editable()
    {
        if(! auth()->check()) return false;

        return $this->user_id == auth()->user()->id;
    }

    /**
     * Shrink the image to a thumbnail
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(100)->height(100);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
