<?php

namespace App\Http\Controllers;

use App\ConstructionSite;
use App\Images;
use App\Mailing;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as AnotherRequest;

class MailController extends Controller
{
    public function sendDiary(AnotherRequest $request, $diary_id, $csite_id){

        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $csite = ConstructionSite::all()->where('id', $csite_id)->first();
        $diary = DB::table('diaries')->where('id', $diary_id)->first();
        $images = Images::all()->where('diary_key', $diary->images);
        $reciver = Request::input('email');

        $exiting_email = Mailing::all()->where('email', $reciver)->first();

        $description = strip_tags($diary->description);
        $issues = strip_tags($diary->issues);

        // If user is logged in than enter user id near email in mailing list database.
        if ( Auth::check() ) {
            $user_id = Auth::id();
        } else {
            $user_id = 0;
        }

        if (count($exiting_email) > 0) {
            /* Do nothing for now */
        } else {
            $mailing = new Mailing;
            $mailing->email = $reciver;
            $mailing->user_id = $user_id;
            $mailing->save();
        }

        $username = User::all()->find($user_id)->first();

        $context = array(
            'diary' => $diary,
            'images' => $images,
            'csite' => $csite,
            'description' => $description,
            'issues' => $issues,
            'counter' => 0,
            'username' => $username
        );

        Mail::send('emails.diary', $context, function($message){
            $reciver = Request::input('email');
            $subject = trans('emails.new-diary');

            $message->to($reciver)->from('info@csmanager.com')->subject($subject);
        });

        return redirect()->back()->with(['email-sent' => true]);
    }


}
