<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    // Connection with ConstructionSite model
    public function constructionSite() {
        return $this->belongsTo('App\ConstructionSite');
    }
}
