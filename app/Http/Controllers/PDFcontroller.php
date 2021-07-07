<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
         $dat = [
        //   'title' => 'email test',
         'heading' => 'this email is from : abdelhadi12mouzafir@gmail.com',
          'content' => 'how are you today buddy'        
             ];
        $data["email"] = "@gmail.com";
        $data["title"] = "Welcome to my laravel gmail";
        $data["body"] = "This is the email body.";
        $pdf = PDF::loadView('generate_pdf', $dat);
        Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "test.pdf");
        });

        dd('Email has been sent successfully');
  
      //  return $pdf->download('test.pdf');
    }
}