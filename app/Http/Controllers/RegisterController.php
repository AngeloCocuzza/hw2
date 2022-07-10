<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller { 

    public function signup() 
    {
        $request = request();

        if($this->countErrors($request) === 0) {
            $newUser = User::create([
                'name' => $request['name'],
                'lastname' => $request['lastname'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            if ($newUser) {
                Session::put('tt_user_id', $newUser->id);
                return redirect('home');
            } 
            else {
                return redirect('register')->withInput();
                echo("ciao");
            }
        }

        else 
        return redirect('register')->withInput();
    }

    private function countErrors($data) {
        $error = array();

        if (strlen($data["password"]) < 7) {
            $error[] = "Caratteri password insufficienti";
        } 
        if (strcmp($data["password"], $data["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        return view('register');
    }

}
?>