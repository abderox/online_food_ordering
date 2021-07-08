<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Exception;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livreur');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function addtodata(Request $req)
    {
        if (Livreur::where('id_user', Auth::user()->id)->exists()) {
            
            Session::put('error',' you can only submit once!');
            return redirect('/livreur');
        }
        else {
            
        $user =Auth::user();
        $user->name = $req['last_name'];
        $user->email = $req['email'];
        $user->zip=$req['zip'];
        $user->departement=$req['department'];
        $user->prenom=$req->first_name;
        if($req->hasFile('imageid')){
    		$avatar = $req->file('imageid');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/'. $filename ) );

    	
    		$user->image = $filename;
    	
    	}
        $user->save();
        $livreur = new Livreur();
       
        $req->validate([
            'status_expr' =>'required',
            'gender'=>'required',
            'status_etud' =>'required',
            'status_vehicule'=>'required',
            'imageid' => 'mimes:jpeg,bmp,png'
        ]);
        $livreur ->status_exper=$req->status_expr == 'true' ? 1 : 0;
        $livreur ->status_genre=$req->gender == 'true' ? 1 : 0;
        $livreur ->status_vehicule=$req->status_vehicule == 'true' ? 1 : 0;
        $livreur ->status_etud=$req->status_etud == 'true' ? 1 : 0;
        $livreur->id_user=$req->id;
        $age= Carbon::parse($req->date_naissance)->diff(Carbon::now())->y;
        
        $livreur->date_naissance=$req->date_naissance;
        if($req->hasFile('image')){
    		$avata = $req->file('image');
    		$filenam = time() . '.' . $avata->getClientOriginalExtension();
    		//Image::make($avata)->resize(450, 300)->save( public_path('uploads/avatars/identity/'. $filenam ) );
            $avata->move('uploads/avatars/identity/',$filenam);
    		$livreur->identity= $filenam;
    	
    	}
       
        if($age>=18){
        $livreur ->save();
        Session::put('success','Your form has been sent !');
        return redirect('/contactus1');}
        elseif($age<18)
        {
            Session::put('error','birthdate is invalid !');
            return redirect('/livreur');   
        }
    }

    }
    public function Updateinf(Request $request){
        //validation rules

        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255'
        ]);
        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('message','Profile Updated');
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
   
    /** public function __construct()
  
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user)
            {
                return view('livreur')->with('user',$user);
            }
            else{
                return redirect()->route('livreur');
            }
        }
        else{
            return redirect()->back();
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function edit(Livreur $livreur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request)
    {
        $use=User::find($request->input('id_u'));
        $use->user_stat=2;
        $use->save();
        $user=Livreur::find($request->input('id'));
        $user->req_stat=1;
        $user->save();
        Session::put('success','The delivery guy is been added successfully!');
        return redirect('/demandes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
        
        
    
       
        DB::delete('DELETE FROM livreurs WHERE id = ?', [$id]);
        
        Session::put('success','The job-application had been deleted successfully!');
        return redirect('/demandes');
        
    }
    public function send($email)
    {
        $details = [

            'title' => 'Mail from CozaFood',
    
            'body' => 'Concerning food delivery job , 
             we do appologize but your profile doesnt match our characteristics'
    
        ];
    
       
    
        Mail::to($email)->send(new \App\Mail\MyTestMail($details));
       // Session::put('success','The  email has been sent !');
        return redirect()->back()->with('success','The  email has been sent !');
    }
    public function sendh($email)
    {

        $details = [

            'title' => 'Mail from CozaFood',
    
            'body' => 'Welcome to CozaFood , you can start your job from tomorrow on ! 
            use your current account to log in , it will redirect you to your task page .'
    
        ];
    
       
    
        Mail::to($email)->send(new \App\Mail\MyTestMail($details));
        Session::put('success','The  email has been sent !');
        return redirect()->back()->with('success','The  email has been sent !');
    }



    public function sendp($email)
    {
         $dat = [
        //   'title' => 'email test',
         'heading' => '*Job application form*',
          'content' => 'Concerning job delivery'        
             ];
        $data["email"] = $email;
        $data["title"] = "CozaFood";
        $data["body"] =  'Welcome to CozaFood , we are glad to have you with us  . you can start your job from tomorrow on if you are fine with that ! 
        come to visit us at our headquarter , u will find our coordinates in our website .
        please do not forget to fill that form below , and bring it with you sealed by your commune .';
        $pdf = PDF::loadView('generate_pdf', $dat);
        Mail::send('emails.myTestMailpdf', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "cozafood_job.pdf");
        });

        dd('Email has been sent successfully');
  
        Session::put('success','The  email has been sent !');
        return redirect()->back()->with('success','The  email has been sent !');
    }


}
