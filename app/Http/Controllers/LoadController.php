<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Citta;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pacchetti;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;

class LoadController extends Controller {

    public function index() {
        $city = Citta::all();

        return $city;
    }

    
    public function weather($query) {
        $wea_json = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'appid' => env('WEA_APIKEY'),
            'q' => $query,
            'units' => 'metric',
        ]);

        return $wea_json;
    }
}
?>