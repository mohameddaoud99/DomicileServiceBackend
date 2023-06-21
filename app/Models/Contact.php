<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected  $fillable=['message','reparateur_id','demandeur_id'];

    public function demandeServices(){
        return $this->belongsTo(Demandeur::class);
    }
}
