<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citta extends Model {

    protected $table = 'citta';

    protected $fillable = [
        'titolo',
        'descrizione',
        'img',
        'link',
        
    ];

}

?>