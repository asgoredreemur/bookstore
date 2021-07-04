<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentProcess(){
        \Stripe\Stripe::setApiKey("sk_test_51J9dlhLIoC6UpHgDpRFKkV7ARGlUsUTVheFId1vqIUCBPe8rYBdMi4h9NFMzYyI0H680cMP7xke1ms8DWJFsrEfq00ByaBEZAH");

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => 10000,
            'currency' => 'usd', 
            'description' => 'Example charge',
            'source' => $token, 
        ]);
    }
}
