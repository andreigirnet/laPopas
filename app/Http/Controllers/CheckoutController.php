<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function setPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str);
        $amountToInt = round(Cart::total() * 100, 0, PHP_ROUND_HALF_UP);
        $intent = null;
        try {
            if (isset($json_obj->payment_method_id)) {
                # Create the PaymentIntent
                $customer = \Stripe\Customer::create([
                    'email' => auth()->user()->email,
                    'description' => 'New customer',
                    'metadata' => [
                        'name' => auth()->user()->name,
                    ],
                ]);
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $json_obj->payment_method_id,
                    'amount' => $amountToInt,
                    'currency' => 'eur',
                    'confirmation_method' => 'manual',
                    'statement_descriptor' => 'laPopas',
                    'confirm'=> 'true',
                    'customer'=> $customer->id,
                    'payment_method_types' => ['card'],
                    'description' => 'Payment made by '. auth()->user()->email
                ]);
            }
            if (isset($json_obj->payment_intent_id)) {
                $intent = \Stripe\PaymentIntent::retrieve(
                    $json_obj->payment_intent_id
                );
                $intent->confirm();
            }
            $this->generateResponse($intent, $request);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            # Display error on client
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }

    }
    public function generateResponse($intent, Request $request) {
        # Note that if your API version is before 2019-02-11, 'requires_action'
        # appears as 'requires_source_action'.
        if ($intent->status == 'requires_confirmation' &&
            $intent->next_action->type == 'use_stripe_sdk') {
            # Tell the client to handle the action
            echo json_encode([
                'requires_confirmation' => true,
                'payment_intent_client_secret' => $intent->client_secret
            ]);
        } else if ($intent->status == 'succeeded') {
            # The payment didn’t need any additional actions and completed!
            # Handle post-payment fulfillment
            $productsArray = [];
            foreach (Cart::content() as $item){
                $value = '- ' . $item->name . ' | Qty: ' . $item->qty . ' | €: ' . $item->price . '<br>';
                array_push($productsArray, $value);
            }
            $productsString = implode(' ',$productsArray);
            Order::create([
                'user_id' => auth()->user()->id,
                'products' => $productsString,
                'totalQty' => Cart::count(),
                'totalPaid' => Cart::total(),
                'address' => $request->address,
                'city' => $request->city,
                'county' => $request->county,
                'country' => $request->country,
                'status' => 'paid',
                'comments'=> $request->comments
            ]);
            Cart::destroy();
            $request->session()->flash('success', 'Payment has been received successfully');
            echo json_encode([
                "success" => true
            ]);
        } else {
            # Invalid status
            http_response_code(500);
            echo json_encode(['error' => 'Invalid PaymentIntent status']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
