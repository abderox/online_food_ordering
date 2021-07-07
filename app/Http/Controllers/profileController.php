<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user)
            {
                return view('profile')->with('user',$user);
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
            
        }
    }
    public function showpro()
    {
        //
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user)
            {
                return view('profilead')->with('user',$user);
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
            
        }
    }
    public function showproliv()
    {
        //
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user)
            {
                return view('profilel')->with('user',$user);
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
            
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user=User::find(Auth::user()->id);
        return view('editprofile')->with('user',$user);
    }
    public function editad()
    {
        $user=User::find(Auth::user()->id);
        return view('editprofilead')->with('user',$user);
    }
    public function editliv()
    {
        $user=User::find(Auth::user()->id);
        return view('editprofilel')->with('user',$user);
    }
    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255',
            'image' => 'mimes:jpeg,bmp,png'
        ]);
        $user =Auth::user();
        $user->name = $request['name'];
        $user->prenom = $request['prenom'];
        $user->zip = $request['zip'];
        $user->departement = $request['departement'];
        $user->email = $request['email'];
        $user->phone_number = $request['phone_number'];
        if($request->hasFile('image')){
    		$avatar = $request->file('image');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/'. $filename ) );

    	
    		$user->image = $filename;
    	
    	}
        $user->save();
       
        return back()->with('message','Profile Updated');
        

           

           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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

