<?php
namespace App\Http\Controllers; 
use Illuminate\Routing\Controller;
use App\Models\Carrello;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class CarrelloController extends Controller {
    
    public function index() {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('login');

        $tot = DB::select("SELECT ROUND(sum(c.prezzo)) as totale FROM carrello l, pacchetti c where c.id=l.pacchetti_c and l.user = $user->id");
        
        
        return view("carrello")->with("user", $user)->with("tot", $tot);
    }

    public function item($query) {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);
        $items = DB::select("SELECT pacchetti_c, COUNT(id) as quantita FROM carrello WHERE pacchetti_c= $query and user= $user->id GROUP BY pacchetti_c");

        return $items;
        
    } 
}
?>