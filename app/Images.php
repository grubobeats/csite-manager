<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    // Connection with model Diary
    public function diary() {
        return $this->belongsTo('App\Diary');
    }
}
