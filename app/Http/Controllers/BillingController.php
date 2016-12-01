<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function index() {

        $user = Auth::user();


        $context = array(
            'user' => $user,
        );
        return view('billing/billing', $context);
    }

    public function cancelSubscription() {
        $user = Auth::user();
        // $user->subscription('main')->cancel();
        $user->subscription('main')->cancelNow();

        return redirect()->back()->with(['canceled'=>true]);
    }

    public function makeSubscription(Request $request) {

        $user = Auth::user();
        $token = $request['token'];

        $user->newSubscription('main', 'monthly')->create($token);

        return "true";
    }

}
