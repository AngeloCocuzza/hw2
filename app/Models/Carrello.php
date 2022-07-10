<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrello extends Model {

    protected $table = 'carrello';

    protected $fillable = [
        'user', 'pacchetti_c',
    ];

    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    public function pacchetti() {
        return $this->belongsTo('App\Models\Pacchetti');
    }

}

?>