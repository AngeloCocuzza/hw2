<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;




class LoginController extends Controller {

    public function login() {
        if(session('tt_user_id') != null) {
            return redirect('home');

        }
        else {
            $error='';
           
            return view('login')->with("error", $error);
        }
    }

    public function checklogin() {
        if(request('email') === null || request('password') === null) {
            $error = "Inserire tutti i campi";
            return view('login')->with('error', $error);
        }

        $user = User::where('email', request('email'))->first();
        if($user !== null) {
            if(Hash::check(request('password'),$user->password) !== false ) {
                Session::put('tt_user_id', $user->id);
                return redirect('home');
            }
            else {
                $error = 'Password errata';
                return view('login')->with('error', $error);
            }
        }
        else {
            $error = 'Le credenziali sono sbagliate';
            return view('login')->with('error', $error);
        }
    }
    public function logout() {
        Session::flush();
        return redirect('login');
    }
}
?>
