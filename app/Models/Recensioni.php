<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Recensioni extends Model {

    protected $table = 'recensioni';

    protected $fillable = [
        'voto','id_recensore', 'titolo','utente', 'recensione',
    ];

    public $timestamps  =  false;

    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    

   
}

?>