<?php

namespace App\Http\Controllers;

use App\ConstructionSite;
use Illuminate\Http\Request;

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
        $construction_site = ConstructionSite::all();

        return view('home', [ 'construction_site' => $construction_site]);
    }
}
