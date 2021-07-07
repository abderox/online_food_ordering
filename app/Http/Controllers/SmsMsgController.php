<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsMsgController extends Controller
{
    public function sendSmsToMobile()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('cf2511c8', 'pC3npAGZdKIJi020');
        $client = new \Nexmo\Client($basic);
 
        $message = $client->message()->send([
            'to' => '212636588390',
            'from' => 'Abdelhadi',
            'text' => 'Your order has been taken , 30 minutes maximum'
        ]);
 
        dd('SMS has sent.');
    }
}
