<?php

  

namespace App\Http\Controllers;

  

use PDF;

use Mail;

class SendEmailController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        $data["email"] = "erroukismail@gmail.com";

        $data["title"] = "From ItSolutionStuff.com";

        $data["body"] = "This is Demo";

 

        $files = [

            public_path('TP4.pdf')

           

        ];

  

        Mail::send('emails.myTestMail', $data, function($message)use($data, $files) {

            $message->to($data["email"], $data["email"])

                    ->subject($data["title"]);

 

            foreach ($files as $file){

                $message->attach($file);

            }

            

        });

 

        dd('Mail sent successfully');

    }

}