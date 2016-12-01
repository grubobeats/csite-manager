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
        $user->subscription('main')->cancelNow();

        return redirect()->back()->with(['canceled'=>true]);
    }
}
