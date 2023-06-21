<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $table = 'evaluation';
    protected  $fillable=['valeur','reparateur_id','demandeur_id'];

    public function demandeServices(){
        return $this->belongsTo(Demandeur::class);
    }
}
