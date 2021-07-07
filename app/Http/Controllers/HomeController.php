<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('aboutus');
    }
    public function contactus()
    {
        return view('contactus');
    }
    public function contactus1()
    {
        return view('contactus1');
    }


    public function contact()
    {
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user)
            {
                return view('contactus1')->with('user',$user);
            }
            else{
                return view('contactus1');
            }
        }
        else{
            return  view('contactus');
            
        }
    }
    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'phone_number' => [ 'string','min:10','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'message' => ['required','string','max:1200']
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone_number;
        $contact->message = $request->message;

        $contact->save();
        
        Mail::send('emails.contact_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'phone_number' => $request->get('phone_number'),
                 'user_message' => $request->get('message'),
                 'company' => $request->company
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  if(empty($request->company)) {
                  $message->to('abdelhadi12mouzafir@gmail.com','abdelhadi12mouzafir@gmail.com')->subject($request->subject);
                  }
                  else {
                    $message->to('abdelhadi12mouzafir@gmail.com','abdelhadi12mouzafir@gmail.com')->subject($request->subject."  BUISNESS");
                  }
                
               });
               return redirect()->back()->with('success','The  message has been sent !');
    }

}
