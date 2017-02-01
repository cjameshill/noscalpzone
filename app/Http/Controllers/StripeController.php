<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Tickets;

class StripeController extends Controller
{

    public function __construct() {

    }

    public function handleStripePayment() {

        Stripe::setApiKey(config('services.stripe.secret'));

        $ticket = Ticket::findOrFail(1);

        $user = Auth()->user();

        try {

            // if guest
            // check email if stripe customer locally - use stripe customer ID
            // create stripe customer
            // create local customer with stripe customer id
            // charge new card
            // save payment from event webhook


//            $customer = Customer::create([ // STRIPE
//                'email' => request('form.email'),
//                'source' => request('stripe.stripeToken')
//            ]);



            Charge::create([ // STRIPE
                'customer' => $user->customer->stripe_cust_id,
                'amount' => $ticket->amount,
                'currency' => 'usd'
            ]);


        } catch (\Exception $e){
            return response()->json(['status' => $e->getMessage(), 'paymentSuccess' => false]);
        }

        return response()->json(['status' => 'Successful payment!', 'paymentSuccess' => true]);

    }


    public function source(User $user) {

        return $user->customer->source->data[0];

    }

}
