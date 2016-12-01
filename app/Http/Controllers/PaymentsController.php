<?php

namespace App\Http\Controllers;

use App\Donation;
use App\User;
use App\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Stripe\Stripe;

class PaymentsController extends Controller
{
    /**
    * Show checkout page
    */
    public function pay() {

        $user = Auth::user();

        $context = array(
            'user' => $user
        );

        return view('checkouts.checkout', $context);
    }

    /**
     * Show donating page
     */
    public function donate() {
        return view('checkouts.donation');
    }

    /**
    * Make payment
    */
    public function postPay(Request $request) {

        $user_id = Auth::id();

        // Stripe test or live secret API key
        Stripe::setApiKey('sk_test_Y0L6a7WV76B297VS9sDwljv2');

        $amount = $request->input('amount') * 100;
        $token = $request->input('stripeToken');

        // Create a charge: this will charge the user's card
        try {
          $charge = \Stripe\Charge::create(array(
              "amount" => $amount, // Amount in cents - Add dynamic value
              "currency" => "eur",
              "source" => $token,
              "description" => "Donation" // add description for services
            ));

        } catch (\Stripe\Error\Card $e) {

        }

        // Adding informations to donations table in db
        $donor = new Donation();
        $donor->user_id = $user_id;
        $donor->name = $request->input('name');
        $donor->amount = $request->input('amount');
        $donor->card_number = $request->input('card_number');
        $donor->exp_month = $request->input('exp_month');
        $donor->exp_year = $request->input('exp_year');
        $donor->ccv = $request->input('ccv');
        $donor->save();

        // Updating user
        $user = User::all()->find($user_id)->first();
        $user->donated = true;
        $user->update();

        return redirect()->route('checkout.success')->with(['donated'=>true]);
    }

    public function success() {
        return view('checkouts/success');
    }

    public function makeSubscription() {
        $user = Auth::user();
        $token = Input::get('stripeToken');

        $user->newSubscription('main', 'monthly')->create($token);

        return view('checkouts/success')->with(['subscribed'=>true]);
    }

}
