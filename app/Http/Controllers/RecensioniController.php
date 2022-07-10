<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Recensioni;
use App\Models\User;

class RecensioniController extends Controller {
    
    public function index() {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('login');

        $tot = DB::select("SELECT ROUND(sum(c.prezzo)) as totale FROM carrello l, pacchetti c where c.id=l.pacchetti_c and l.user = $user->id");
        
        
        return view("recensioni")->with("user", $user)->with("tot", $tot);
    }

    function load() {
        $recensioni = recensioni::orderBy('voto','desc')->get();
        return $recensioni;
    }

   





public function new(){
        $request = request();
        if($request['title'] == null || $request['review'] == null || strlen($request['title']) >  150 || strlen($request['review']) >  2000){
            
            return back()->withInput()->withErrors(
                [
                    'error' => 'emptyFields'
                ]
                );
        }
        $user = User::where('id',Session::get('tt_user_id'))->first();
        if($user == null){
            return back()->withInput()->withErrors(
                [
                    'error' => 'noUser'
                ]
                );
        }
        
      
        $newReview =  Recensioni::create([
            
            'voto'  => $request['voto'],
            'id_recensore'=> $user['id'],
            'titolo'  => $request['title'],
            'utente' => $user['name']. " " .$user['lastname'],
            'recensione'  => $request['review'],
            
            ]);
        
        
        if($newReview){   
            return redirect('recensioni');
        }
        else return back()->withInput()-withErrors([
            'error' => 'ReviewNotInserted'
        ]);



}}


?>
