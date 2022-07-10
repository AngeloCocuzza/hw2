<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Pacchetti;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class PacchettiController extends Controller {
    public function index() {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('login');

        $tot = DB::select("SELECT ROUND(sum(c.prezzo)) as totale FROM carrello l, pacchetti c where c.id=l.pacchetti_c and l.user = $user->id");
        
        return view("pacchetti")->with("user", $user)->with('tot', $tot);
    }

    function load($query) {
       // $pacchetti = pacchetti::all;
        $pacchetti = Pacchetti::where('destinazione_tour','like','%'.$query.'%')->get();
        //$pacchetti = DB::select("SELECT * from pacchetti where destinazione_tour LIKE $query");

        return $pacchetti;
    }
    function loadcart() {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('login');

         $pacchetti = pacchetti::all();
        
         return $pacchetti;
     }
}
?>
