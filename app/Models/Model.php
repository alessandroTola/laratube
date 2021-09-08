<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;


/**
 * Each model that would have the primary key id ad a uuid, have to extend this BaseModel
 */
class Model extends BaseModel
{
    use HasFactory;

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });

    }

    protected $guarded = [];
}
