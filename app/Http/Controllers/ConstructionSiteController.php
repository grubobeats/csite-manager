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

        $this->validate($request, array(
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'investor' => 'required',
        ));

        $post = new ConstructionSite();
        $post->name = $request['name'];
        $post->city = $request['city'];
        $post->address = $request['address'];
        $post->investor = $request['investor'];

        $request->user()->constructionSites()->save($post);

        return redirect()->route('dashboard')->with(['added' => true]);
    }

    public function post_editConstructionSite(Request $request, $csite_id) {
        $this->validate($request, array(
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'investor' => 'required',
        ));

        $post = ConstructionSite::where('id', $csite_id)->first();
        $post->name = $request['name'];
        $post->city = $request['city'];
        $post->address = $request['address'];
        $post->investor = $request['investor'];

        $request->user()->constructionSites()->where('id', $csite_id)->save($post);

        return redirect()->route('dashboard')->with(['edited' => true]);
    }

    public function deleteConstructionSite($csite_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();
        $csite->delete();

        return redirect()->route('dashboard')->with(['deleted' => true]);
    }

    public function editConstructionSite($csite_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();

        return view('edit-construction-site', ['construction_site' => $csite]);
    }



}
