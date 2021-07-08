<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Livreur ;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($resto)
    {
       
         
               
        //     $orders  = DB::table('plats')
        //     ->join('orders', 'plats.id', '=', 'orders.id_plat')
        //    // ->select('plats.*', 'orders.*')
        //     ->select('plats.price','orders.address_client')
            
            
        //      //->join('plats', 'plats.id', '=', ' orders.id_plat')
        //     // ->join('restaurants', 'restaurants.id ', '=', 'orders.id_restaurant')
        //     //->select('plats.price','orders.address_client')
            
        //     ->get();
            //  $orders = DB::table('restaurants')
            
            
            // ->join('plats', 'restaurants.id_res', '=', 'plats.id_restaurant')
            // ->join('orders', 'plats.id', '=', 'orders.id_plat')
            // ->select('plats.*','orders.*','restaurants.*')
            // ->where('status_order',0)
            //  ->get();
            //  if($orders->count()!=0) {
            // return view('ordersdelivery')->with('orders',$orders);
            //  }
            //  else {
            //     Session::put('null','no data to show !');
            //     return view('ordersdelivery')->with('orders',$orders);
            //  }
            
                                            // ->with('orders',$orders2)   
           
            $orders = DB::table('restaurants')
            
            
            ->join('plats', 'restaurants.id_res', '=', 'plats.id_restaurant')
            ->join('orders', 'plats.id', '=', 'orders.id_plat')
            ->join('users', 'orders.id_client', '=', 'users.id')
            ->select(DB::raw('GROUP_CONCAT(plats.nom_plat) as nomplats'),'orders.*','restaurants.nom','restaurants.address','users.id','users.rue')
           ->groupBy('orders.id_client')
            ->where('status_order',0)
            ->where('restaurants.nom',$resto)
            
            
          
             ->get();
             



            // $orders = DB::table('plats')
            
            
           
            //  ->join('orders', 'plats.id', '=', 'orders.id_plat')
            // ->select('orders.*')
            // ->select('plats.*')
            
            // ->where('status_order',0)
            
         
            
          
            //  ->get();
            
             
           
             //dd($orders);
             if($orders->count()!=0) {
                return view('ordersdelivery')->with('orders',$orders);
                 }
                 else {
                    Session::put('null','no data to show !');
                    return view('ordersdelivery')->with('orders',$orders);
                 }
            
    }
    public function take(Request $request)
    {
        
        $order=Order::find($request->input('id_order'));
        $order->id_liv=Auth::user()->id;
        $order->status_order=1;
        $order->save();
        $livreur=Livreur::find(Auth::user()->id);
        $ord=Order::where('id_liv',Auth::user()->id)->first();
        if($ord->status_order!=2){
        $livreur->work_stat=1;
        $livreur->save();}
        elseif($ord->status_order=2)
        {
        $livreur->work_stat=2;
        $livreur->save();  
        }
        Session::put('success','order taken!');
        return redirect('/orderclient');
        

    }
    public function mapsclient()
    {
        
       $user=DB::table('orders')
       ->select('orders.*')
       ->where('id_liv',Auth::user()->id)
       ->where('status_order',1)
       ->get();
       if ($user->count()!=0) {
            
        return view('orderclient')->with('user',$user);
    }
    else {
        Session::put('error',' no users to track !');
        return view('maps1')->with('user',$user);
        
    }}
    public function myord()
    {
        $orders = DB::table('restaurants')
        ->join('plats', 'restaurants.id_res', '=', 'plats.id_restaurant')
        ->join('orders', 'plats.id', '=', 'orders.id_plat')
        ->join('users', 'orders.id_client', '=', 'users.id')
        ->select(DB::raw('GROUP_CONCAT(plats.nom_plat) as nomplats'),'orders.*','restaurants.nom','restaurants.address','users.id','users.rue')
        ->where('id_liv',Auth::user()->id)
       ->get();
     
      
        return view('myorders')->with('orders',$orders);
        
    }
    public function showord($id)
    {
           
        $orders = DB::table('restaurants')
        ->join('plats', 'restaurants.id_res', '=', 'plats.id_restaurant')
        ->join('orders', 'plats.id', '=', 'orders.id_plat')
        ->join('users', 'orders.id_client', '=', 'users.id')
        ->select(DB::raw('GROUP_CONCAT(plats.nom_plat) as nomplats'),'orders.*','restaurants.nom','restaurants.address','users.id','users.rue')
       ->where('id_liv',$id)
       ->get();
       
        return view('livorders')->with('orders',$orders);
        if($orders->count()!=0) {
            return view('livorders')->with('orders',$orders);
             }
             else {
                Session::put('null','no data to show !');
                return view('livorders')->with('orders',$orders);
             }
        
    }

    public function show_resto()
    {
        
        $orders = DB::table('restaurants')
        ->join('plats', 'restaurants.id_res', '=', 'plats.id_restaurant')
        ->join('orders', 'plats.id', '=', 'orders.id_plat')
        ->select('restaurants.*')
        ->where('status_order',0)
        ->groupBy('restaurants.nom')
         ->get();
       
            return view('maps1')->with('orders',$orders);
            
            
        

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
