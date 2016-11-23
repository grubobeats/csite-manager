<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    public function constructionSite() {
        return $this->belongsTo('App\ConstructionSite');
    }

    // Connection with Diary model
    public function images() {
        return $this->hasMany('App\Images');
    }
}
