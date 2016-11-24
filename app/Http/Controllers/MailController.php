<?php

namespace App\Http\Controllers;

use App\ConstructionSite;
use App\Diary;
use App\Images;
use App\Mailing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class MailController extends Controller
{
    public function sendDiary($diary_id, $csite_id){
        $csite = ConstructionSite::all()->find($csite_id)->first();
        $diary = Diary::all()->find($diary_id)->first();
        $images = Images::all()->where('diary_key', $diary->images);
        $reciver = Request::input('email');

        $exiting_email = Mailing::all()->where('email', $reciver)->first();

        if (count($exiting_email) > 0) {

        } else {

            // If user is logged in than enter user id near email in mailing list database.
            if ( Auth::check() ) {
                $user_id = Auth::id();
            } else {
                $user_id = 0;
            }

            $mailing = new Mailing;
            $mailing->email = $reciver;
            $mailing->user_id = $user_id;
            $mailing->save();
        }

        $context = array(
            'diary' => $diary,
            'images' => $images,
            'csite' => $csite,
            'counter' => 0
        );

        Mail::send('emails.diary', $context, function($message){
            $reciver = Request::input('email');

            $message->to($reciver)->from('info@csmanager.com')->subject('New construction diary');
        });

        return redirect()->back();
    }


}
