<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    /**
     * Relationships whit che User class
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

}
