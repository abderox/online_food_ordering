<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Http\Request;
  

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('plats.index');
    
// });

  //------------------------------------Routes Abdelhadi-------------------------------------
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
// Route::get('send-email-pdf', [SendEmailController::class, 'index'])->name('send-email-pdf');
Route::get('/contactus', [App\Http\Controllers\HomeController::class, 'contact'])->name('contactus');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/livreur', [App\Http\Controllers\LivreurController::class, 'show'])->name('livreur');

Route::get('/maps', function () {
    return view('maps');
});
Route::get('/profile', [App\Http\Controllers\profileController::class, 'show'])->name('profile');
Route::get('/profilead', [App\Http\Controllers\profileController::class, 'showpro'])->name('profilead');
Route::get('/profilel', [App\Http\Controllers\profileController::class, 'showproliv'])->name('profilel');
Route::get('/editprofile', [App\Http\Controllers\profileController::class, 'edit'])->name('editprofile');
Route::get('/editprofilead', [App\Http\Controllers\profileController::class, 'editad'])->name('editprofilead');
Route::get('/editprofilel', [App\Http\Controllers\profileController::class, 'editliv'])->name('editprofilel');
Route::post('/profileUpdate', [App\Http\Controllers\profileController::class, 'profileUpdate']);
// Route::get('/livreur', [App\Http\Controllers\LivreurController::class, 'index'])->name('livreur');
Route::post('/addtodata', [App\Http\Controllers\LivreurController::class, 'addtodata']);
//Route::get('/livreur', [App\Http\Controllers\LivreurController::class, 'show'])->name('livreur');
Route::get('/demandes', [App\Http\Controllers\AdminController::class, 'show'])->name('demandes');
Route::get('/demandelivinf/{id}', [App\Http\Controllers\AdminController::class, 'showinf'])->name('demandelivinf');
Route::get('/delete/{id}', [App\Http\Controllers\LivreurController::class, 'delete']);
Route::get('/accept', [App\Http\Controllers\LivreurController::class, 'accept']);
Route::get('/sendn/{email}', [App\Http\Controllers\LivreurController::class, 'send']);
Route::get('/sendp/{email}', [App\Http\Controllers\LivreurController::class, 'sendp']);
Route::get('/resto/{rest}', [App\Http\Controllers\OrderController::class, 'show']);
Route::get('/map/maps', [App\Http\Controllers\LivreurController::class, 'maps']);
Route::get('/orderclient', [App\Http\Controllers\OrderController::class, 'mapsclient']);
//testing route 
//Route::get('/workingdeli', [App\Http\Controllers\AdminController::class, 'index1']);
Route::get('/workingdeli', [App\Http\Controllers\AdminController::class, 'showdeli'])->name('workingdeli');
Route::get('/ordersdelivery', [App\Http\Controllers\OrderController::class, 'show'])->name('ordersdelivery');
Route::get('/take', [App\Http\Controllers\OrderController::class, 'take']);
Route::get('/contactus1', [App\Http\Controllers\HomeController::class, 'contact'])->name('contactus1');
Route::post('/send', [App\Http\Controllers\HomeController::class, 'send']);
Route::get('/mapresto', [App\Http\Controllers\OrderController::class, 'show_resto']);
Route::get('/myorders', [App\Http\Controllers\OrderController::class, 'myord']);
Route::get('/livorders/{id}', [App\Http\Controllers\OrderController::class, 'showord']);
Route::get('/message', function() {
    // show a form
    return view('message');
});
//-------------------------------root admin-------------------------------
Route::get('/dash', function() {
    // show a form
    return view('admin.dashadmin');
});
Route::get('/orders', function() {
    // show a form
    return view('admin.demandes');
});

Route::post('/message', function(Request $request) {
    // TODO: validate incoming params first!

    $url = "https://messages-sandbox.nexmo.com/v0.1/messages";
    $params = ["to" => ["type" => "whatsapp", "number" => $request->input('number')],
        "from" => ["type" => "whatsapp", "number" => "14157386170"],
        "message" => [
            "content" => [
                "type" => "text",
                "text" => "Hello from Vonage and Laravel :) Please reply to this message with a number between 1 and 100"
            ]
        ]
    ];
    $headers = ["Authorization" => "Basic " . base64_encode('cf2511c8' . ":" . 'pC3npAGZdKIJi020')];

    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', $url, ["headers" => $headers, "json" => $params]);
    $data = $response->getBody();
    Log::Info($data);

  
});
Route::get('send-sms-message', [App\Http\Controllers\SmsMsgController::class, 'sendSmsToMobile']);
Route::get('/webhooks/status', function(Request $request) {
    $data = $request->all();
    Log::Info($data);
});

Route::post('/webhooks/inbound', function(Request $request) {
    $data = $request->all();

    $text = $data['message']['content']['text'];
    $number = intval($text);
    Log::Info($number);
    if($number > 0) {
        $random = rand(1, 8);
        Log::Info($random);
        $respond_number = $number * $random;
        Log::Info($respond_number);
        $url = "https://messages-sandbox.nexmo.com/v0.1/messages";
        $params = ["to" => ["type" => "whatsapp", "number" => "212636588390"],
            "from" => ["type" => "whatsapp", "number" => "14157386170"],
            "message" => [
                "content" => [
                    "type" => "text",
                    "text" => "The answer is " . $respond_number . ", we multiplied by " . $random . "."
                ]
            ]
        ];
        $headers = ["Authorization" => "Basic " . base64_encode(env('NEXMO_API_KEY') . ":" . env('NEXMO_API_SECRET'))];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, ["headers" => $headers, "json" => $params]);
        $data = $response->getBody();
    }
    Log::Info($data);
});
        Route::get('/maps', function () {
            return view('maps');
        });
        //------------------------------------Routes Nablil-------------------------------------

       
        // Route::get('/boutique', [PlatController::class ,'index'])->name('plats.index');
      
        Route::get('/boutique/{id}', [PlatController::class ,'show'])->name('plats.show');
 
        Route::post('/panier/ajouter',[CartController::class ,'store'])->name('cart.store');
        Route::get('/panier', [CartController::class ,'index'])->name('cart.index');
        Route::delete('/panier/{rowId}', [CartController::class ,'destroy'])->name('cart.destroy');

        Route::get('/videpanier', function () {
        Cart::destroy();
        return back()->with('succes','tout plat a été supprimé');
        });
        //checkout route
       
        Route::get('/paiement', [CheckoutController::class ,'index'])->name('checkout.index');
   
        Route::post('/charge', [CheckoutController::class ,'charge']);
        Route::post('/insertaddord', [CheckoutController::class ,'insertaddord']);
        Route::patch('/panier/{rowId}', [CartController::class ,'update'])->name('cart.update');
    });
        Route::get('/', [PlatController::class ,'index'])->name('plats.index');
        Route::get('/aboutus', [HomeController::class ,'index'])->name('aboutus');