<?php

namespace App\Http\Controllers;

use App\ConstructionSite;
use App\Diary;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $construction_site = ConstructionSite::where('user_id', $user_id)->orderBy('id', 'desc')->get();

        $count_diaries = 0;

        foreach ($construction_site as $csite) {
            $count_diaries += Diary::where('csite_id', $csite->id)->count();
        }

        $context = array(
            'construction_site' => $construction_site,
            'count_diaries' => $count_diaries
        );

        return view('home', $context);
    }
}
