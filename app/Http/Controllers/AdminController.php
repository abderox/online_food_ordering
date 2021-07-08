<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //testing routes
    public function index()
    {
        return view('demandelivinf');
    }
    public function index1()
    {
        return view('workingdeli');
    }
    public function showinf($id){
        
     $demandes_livreurs  = DB::table('users')
     ->join('livreurs', 'users.id', '=', 'livreurs.id_user')
     ->select('users.*', 'livreurs.*')
    
     ->where('livreurs.id',$id)
     ->get();
     
     return view('demandelivinf')->with('demandes_livreurs',$demandes_livreurs);
    }
    public function showdeli()
    {
        $demandes_livreurs  = DB::table('users')
        ->join('livreurs', 'users.id', '=', 'livreurs.id_user')
        ->select('users.*', 'livreurs.*')
        ->get();
        
        return view('workingdeli')->with('demandes_livreurs',$demandes_livreurs); 
    }
    public function showemploie()
    {
        $livreurs  = DB::table('users')
        ->join('livreurs', 'users.id', '=', 'livreurs.id_user')
        ->select('users.*', 'livreurs.*')
        ->get();
        
        return view('admin.employe')->with('livreurs',$livreurs); 
    }

    public function __construct()
    {
        $this->middleware('auth');
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $demandes_livreurs = Livreur::where('req_stat', 0)
               ->orderBy('id')
               ->get();
               
            $demandes_livreurs  = DB::table('users')
            ->join('livreurs', 'users.id', '=', 'livreurs.id_user')
            ->select('users.*', 'livreurs.*')
            ->where('livreurs.req_stat',0)
            ->get();
            if($demandes_livreurs->count()!=0) {
            return view('demandes')->with('demandes_livreurs',$demandes_livreurs);
            }
            else{
                Session::put('null','no data to show !');
                return view('demandes')->with('demandes_livreurs',$demandes_livreurs);
            }
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
