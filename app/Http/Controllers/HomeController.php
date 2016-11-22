<?php

namespace App\Http\Controllers;

use App\ConstructionSite;
use Illuminate\Http\Request;
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
        $construction_site = ConstructionSite::all()->where('user_id', $user_id);

        return view('home', [ 'construction_site' => $construction_site]);
    }
}
