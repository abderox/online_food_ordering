<?php
  
namespace App\Http\Controllers;
use App\Models\Plat;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('cart.index');
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
   //   dd($request->id,$request->nom_plat,$request->price);
     $plat=Plat::find($request->plat_id);
    //dd($plat);
     $duplicata=Cart::search(function ($cartItem, $rowId) use($plat){
      
              return $cartItem->id === $plat->id;
     });
       // dd($duplicata);    
       
  if($duplicata->isNotEmpty())
        {   
           return redirect()->route('plats.index')->with('succes','Le produit a déjà été ajouté.');     
        }

   $plat=Plat::find($request->plat_id);
   // dd($plat);
       Cart::add($plat->id,$plat->nom_plat,1,$plat->price)->associate('App\Models\Plat');
   //    array_push($array, $plat->id);
  //      return redirect()->route('plats.index');
  //      Cart::add($request->id,$request->nom_plat,1,$request->price)->associate('App\Models\Plat');
  
  
     $order=new Order();
     $order->id_plat=$request['plat_id'];
     $order->id_client=Auth::user()->id;
    
     $order->save();  
  
      return redirect()->route('plats.index')->with('succes','Le produit a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $rowId)
    {    
        Cart::update($rowId, $request->quantity);
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }
        session()->flash('succes', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('succes','le plat a été supprimé');
    }
}
