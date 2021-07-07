<?php

namespace App\Http\Controllers;
use App\Models\Plat;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    public function index()
    { //dd(Cart::content());
        //$plats=Plat::inRandomOrder()->take(6)->get();
        $plats=Plat::latest()->paginate(8);
      //   dd($plats);
        return view ('plats.index')->with('plats',$plats);
    }
    public function show($id)
    {
        $plats=Plat::where('id',$id)->first();
      //   dd($plats);
        return view ('plats.show')->with('plats',$plats);
    }
 
}
