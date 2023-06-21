<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandeServices extends Model
{
    use HasFactory;

    protected $table = 'demandeservice';

    protected  $fillable=['etat','date', 'demandeur_id','reparateur_id'];

    public function demandeur(){
        return $this->belongsTo(demandeur::class);
    }


    public function reparateur(){
        return $this->belongsTo(reparateur::class);
    }


}
