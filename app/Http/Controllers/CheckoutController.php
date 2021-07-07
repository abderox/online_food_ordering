<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        return view('checkout.index');
    }
    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey('sk_test_51J023gKSRagQSfNozkwtwA82QBQ6HF3MB7m8RlaxdKUjAIQsUCF9FMeDKtASCcN4SYKI7aZhsvh8PSQEA5dhdAxG00w01UMpZM');
        
            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));
        
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => round(Cart::total()*10),
                'currency' => 'usd'
            ));
        
            $order=DB::table('orders')
            ->where('id_client',Auth::user()->id)
            ->where('id_plat',$request->input('idplat'))
            ->update([
               'payer' => $request->input('payer'),
     
            ]);
     
            Cart::destroy();
            return back()->with('succes','the payament transactions has been made successfully !');
     
    } catch (\Exception $ex) {
        return $ex->getMessage();
    }
    
    

    }
    public function insertaddord(Request $request)
    {
        $order=DB::table('orders')
        ->where('id_client',Auth::user()->id)
        ->update([
           'lat' => $request->input('lalt'),
           'lng' => $request->input('lng')
          
        ]);
        return redirect()->back()->with('success','The  email has been sent !');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showorder(Request $request)
    {
               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
