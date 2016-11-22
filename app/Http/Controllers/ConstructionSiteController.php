<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConstructionSite;

class ConstructionSiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('add-construction-site');
    }

    public function addNewConstructionSite(Request $request) {

        $post = new ConstructionSite();
        $post->name = $request['name'];
        $post->city = $request['city'];
        $post->address = $request['address'];
        $post->investor = $request['investor'];

        $request->user()->constructionSites()->save($post);

        return redirect()->route('dashboard');
    }

}
