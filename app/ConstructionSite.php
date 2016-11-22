<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConstructionSite extends Model
{
    // Connection with User model
    public function user() {
        return $this->belongsTo('App\User');
    }

    // Connection with Diary model
    public function diary() {
        return $this->hasMany('App\Diary');
    }
}
