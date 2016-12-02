<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function index() {

        $user = Auth::user();

        $donations = Donation::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $all_donations = 0;

        foreach ($donations as $donation) {
            $all_donations += $donation->amount;
        }

        $context = array(
            'user' => $user,
            'donations' => $donations,
            'all_donations' => $all_donations
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
