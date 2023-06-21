<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandeur extends Model
{
    use HasFactory;
    protected $table = 'demandeur';
    protected  $fillable=['nom','prenom', 'adresse','email','telephone','ville','password'];

    public function demandeServices(){
        return $this->hasMany(demandeServices::class);
    }
}
