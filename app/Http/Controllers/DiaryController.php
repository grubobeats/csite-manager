<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConstructionSite;

class DiaryController extends Controller
{
    //
    public function addDiary($csite_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();

        return view('add-diary', ['construction_site' => $csite]);
    }
}
