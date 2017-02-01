<?php

namespace App\Http\Controllers;

use App\Custom\myUUID;
use App\Payment;
use App\Source;
use App\User;
use Illuminate\Http\Request;

class WebhooksController extends Controller
{
    public function handle() {

        $payload = request()->all();

        $method = $this->eventToMethod($payload['type']);

        if(method_exists($this, $method)){
            return $this->$method($payload);
        }

    }

    protected function eventToMethod($event){

        return 'when' . studly_case(str_replace('.', '_', $event));

    }

    protected function whenChargeSucceeded($payload) {

        try {

            $stripe = $payload['data']['object']['customer'];

            $user = User::getUserByStripeId($stripe);

            Payment::create([
                'amount' => $payload['data']['object']['amount'],
                'order_id' => 'order_' . myUUID::getUUID(8),
                'charge_id' => $payload['data']['object']['id'],
                'seller_id' => $user->id,
                'set_id' => 1,
                'tickets' => '',
                'data' => $payload['data']['object']
            ]);

            Source::create([
                'customer_id' => $user->id,
                'data' => [ $payload['data']['object']['source'] ]
            ]);

            return response()->json(['status' => 'Payment Success'], 200);

        } catch (\Exception $e) {

            return response()->json(['status' => $e->getMessage()], 500);

        }



    }


}
