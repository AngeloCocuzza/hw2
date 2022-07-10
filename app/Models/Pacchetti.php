<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacchetti extends Model {

    protected $table = 'pacchetti';

    protected $fillable = [
        'part',
        'destinazione_tour',
        'ora_partenza',
        'prezzo',
        'giorno',
        'descrizione',
    ];

    public function carrello() {
        return $this->hasMany("App\Models\Carrello");
    }
}

?>