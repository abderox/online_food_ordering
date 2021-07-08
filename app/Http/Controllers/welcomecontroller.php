<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plat;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class welcomecontroller extends Controller
{

    public function par() {
        $restaurants=DB::table('restaurants')
                    ->get();
        return view('par')->with('restaurants',$restaurants);
    }

    public function more($id) {
        $restaurants=DB::table('restaurants')
                    ->where('id',$id)
                    ->get();
        return view('more')->with('restaurants',$restaurants);
    }
    public function resh() {
        return view('resh');
    }
    public function resn() {
        return view('resn');
    }
    public function submit(Request $request) {
        $plat= new plat();
        $plat->id_restaurant=2;
        $plat-> nom=$request->nom;
        $plat-> price=$request->price;
        $plat-> description=$request->description;
        $plat-> photo=url();
        $plat-> save();
        Session::put('success','success');
        return redirect ('/resn');
    }

    public function resp() {
        $plats=DB::table('plats')
                    ->where('id_restaurant',auth::id())
                    ->get();
        return view('resp')->with('plats',$plats);
    }
    public function reso() {
        $orders=DB::table('orders')
                    ->where('id_plat',auth::id())
                    ->get();
        return view('reso')->with('orders',$orders);
    }
    //
    public function more1($id) {
        $plats=DB::table('plats')
                    ->where('id',$id)
                    ->get();
        return view('more1')->with('plats',$plats);
    }
}
