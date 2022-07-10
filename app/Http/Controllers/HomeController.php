<?php

namespace App\Http\Controllers;   
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Home;
use Illuminate\Support\Facades\DB;
use App\Models\Citta;
use App\Models\Pacchetti;



class HomeController extends Controller {

    public function index() {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return redirect("login");

        $tot = DB::select("SELECT ROUND(sum(c.prezzo)) as totale FROM carrello l, pacchetti c where c.id=l.pacchetti_c and l.user = $user->id");

        
        return view("home")->with("user", $user)->with('tot', $tot);
    }
}
?>