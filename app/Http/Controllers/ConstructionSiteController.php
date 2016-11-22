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

    public function post_editConstructionSite(Request $request, $csite_id) {

        $post = ConstructionSite::where('id', $csite_id)->first();
        $post->name = $request['name'];
        $post->city = $request['city'];
        $post->address = $request['address'];
        $post->investor = $request['investor'];

        $request->user()->constructionSites()->where('id', $csite_id)->save($post);

        return redirect()->route('dashboard');
    }

    public function deleteConstructionSite($csite_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();
        $csite->delete();

        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted']);
    }

    public function editConstructionSite($csite_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();

        return view('edit-construction-site', ['construction_site' => $csite]);
    }

}
