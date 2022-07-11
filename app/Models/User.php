<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

   
    
    protected $fillable = [
        'email',
        'password',
        'name',
        'lastname'
    ];

    

    public $timestamps=false;

   

    public function carrello() {
        return $this->hasMany("App\Models\Carrello");
    }
    public function recensioni() {
        return $this->hasMany("App\Models\Recensioni");
    }
   
}
?>
