<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparateur extends Model
{
    use HasFactory;
    protected $table = 'reparateur';

     protected  $fillable=['nom','TypeServiceID','prenom', 'adresse','email','telephone','ville','evaluation','password'];

     public function typeServices(){
        return $this->belongsTo(typeServices::class);
       }

       public function demandeServices(){
        return $this->hasMany(demandeServices::class);
       }


}
