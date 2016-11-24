<?php

namespace App\Http\Controllers;

use App\Diary;
use App\ConstructionSite;
use App\Images;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller

{
    /**
     * @param $csite_id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function listDiaries($csite_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();
        $diaries = Diary::all()->where('csite_id', $csite_id);

        $context = array(
            'construction_site' => $csite,
            'diaries' => $diaries
        );
        return view('list-diaries', $context);
    }

    public function showDiaryToGuest($csite_id, $diary_id) {

        $this->middleware('auth', ['except' => array('getActivate', 'getLogin')]);

        $csite = ConstructionSite::where('id', $csite_id)->first();
        $diary = Diary::where('id', $diary_id)->first();
        $images = Images::all()->where('diary_key', $diary->images);

        $context = array(
            'construction_site' => $csite,
            'diary' => $diary,
            'images' => $images,
            'counter' => 0
        );
        return view('diaries/view-diary-as-guest', $context);
    }

    //
    public function addDiary($csite_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();

        return view('add-diary', ['construction_site' => $csite]);
    }

    /**
     * @description: Adding new diary to database
     * @param $csite_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddDiary($csite_id, Request $request){

        // getting all of the post data
        $files = $request->file('images');
        $user_id = Auth::user()->id;

        // Generating unique key for connecting models ( Diary <--> Images)
        $random_string = str_random(40);
        $diary_key = $user_id . "-" . $random_string;

        // If there are files save them to local folder
        if ($files) {
            foreach ($files as $file) {
                // Saving to local folder
                $random = rand(5,5000);
                $name = $file->getClientOriginalName();
                $filename = $user_id . "-" . $csite_id . "-" . $random . "-" . $name;
                Storage::disk('local')->put($filename, File::get($file));

                // Saving to images table in database
                $image = new Images();
                $image->name = $filename;
                $image->path = "../storage/app/" . $filename;
                $image->file_type = "lk";
                $image->diary_key = $diary_key;
                $image->save();
            }
        }

        // Saving to diary table
        $diary = new Diary();
        $diary->day = $request['day'];
        $diary->date = $request['date'];
        $diary->weather = $request['weather'];
        $diary->workers = $request['workers'];
        $diary->description = $request['description'];
        $diary->issues = $request['issues'];
        $diary->images = $diary_key;
        $diary->csite_id = $csite_id;

        $diary->save();

        return redirect()->route('list-diaries', $csite_id);
    }

    public function editDiary($csite_id, $diary_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();
        $diary = Diary::where('id', $diary_id)->first();
        $images = Images::all()->where('diary_key', $diary->images);

        $context = array(
            'construction_site' => $csite,
            'diary' => $diary,
            'images' => $images,
            'counter' => 0
        );

        return view('diaries/edit-diary', $context);
    }

    public function deleteImage($image_id) {
        $image = Images::where('id', $image_id)->first();
        Storage::disk('local')->delete($image->name);

        $image->delete();

        return redirect()->back();
    }

    public function postEditDiary($csite_id, $diary_id, Request $request) {

        $csite = ConstructionSite::where('id', $csite_id)->first();


        // Saving to diary table
        $diary = Diary::find($diary_id);
        $diary->day = $request['day'];
        $diary->date = $request['date'];
        $diary->weather = $request['weather'];
        $diary->workers = $request['workers'];
        $diary->description = $request['description'];
        $diary->issues = $request['issues'];

        $diary->update();

        // Adding Images
        // getting all of the post data
        $files = $request->file('images');
        $user_id = $csite->user_id;

        // Using unique key for connecting models ( Diary <--> Images)
        $diary_key = $diary->images;

        // If there are files save them to local folder
        if ($files) {
            foreach ($files as $file) {
                // Saving to local folder
                $random = rand(5,5000);
                $name = $file->getClientOriginalName();
                $filename = $user_id . "-" . $csite_id . "-" . $random . "-" . $name;
                Storage::disk('local')->put($filename, File::get($file));

                // Saving to images table in database
                $image = new Images();
                $image->name = $filename;
                $image->path = "../storage/app/" . $filename;
                $image->file_type = "lk";
                $image->diary_key = $diary_key;
                $image->save();
            }
        }


        return redirect()->route('list-diaries', $csite_id);
    }

    public function deleteDiary($csite_id, $diary_id) {

        $diary = Diary::where('id', $diary_id)->first();
        $images = Images::where('diary_key', $diary->images);

        $images_list = DB::table('images')->select('name')->where('diary_key', $diary->images)->get();

        $imgs = array();
        foreach ($images_list as $key=>$image) {
            $imgs[] = $image->name;
        }

        Storage::disk('local')->delete($imgs);

        $images->delete();
        $diary->delete();

        return redirect()->route('list-diaries', $csite_id);
    }

    /**
     * @param $csite_id
     * @param $diary_id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @description: Showing diaries
     */
    public function viewDiary($csite_id, $diary_id) {
        $csite = ConstructionSite::where('id', $csite_id)->first();
        $diary = Diary::where('id', $diary_id)->first();
        $images = Images::all()->where('diary_key', $diary->images);

        $context = array(
            'construction_site' => $csite,
            'diary' => $diary,
            'images' => $images,
            'counter' => 0
        );
        return view('diaries/view-diary', $context);
    }

    public function getDiaryImages($filename) {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
