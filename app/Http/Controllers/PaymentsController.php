<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class PaymentsController extends Controller
{
  /**
   * Show checkout page
   */
  public function pay() {
    return view('checkouts.checkout');
  }

  /**
   * Make payment
   */
  public function postPay(Request $request) {

    // Stripe test or live secret API key
    Stripe::setApiKey('sk_test_Y0L6a7WV76B297VS9sDwljv2');

    // Get the credit card details submitted by the form
    $token = $request->input('stripeToken');

    // Create a charge: this will charge the user's card
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => 1000, // Amount in cents - Add dynamic value
        "currency" => "eur",
        "source" => $token,
        "description" => "Example charge" // add description for services
        ));
    } catch(\Stripe\Error\Card $e) {
      // The card has been declined

    }

    return redirect()->back();
  }
}
