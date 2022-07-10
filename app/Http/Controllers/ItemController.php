<?php
namespace App\Http\Controllers;   //  da mettere sempre
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Carrello;
use Illuminate\Support\Facades\DB;
class ItemController extends Controller {
    
    function add($query) {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);


        Carrello::insert([
            'user' => $user->id,
            'pacchetti_c' => $query,
        ]);
    }

    function remove($query) {
        $session_id = session('tt_user_id');
        $user = User::find($session_id);


        Carrello::where([
            'user' => $user->id,
            'pacchetti_C' => $query,
        ])
        ->limit(1)
        ->delete();
    }

}
?>
