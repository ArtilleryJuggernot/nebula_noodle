<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $table = "COMPETENCE";


    public function competenceCategory()
    {
        return $this->belongsTo(CompetenceCategory::class, 'CAT_ID', 'CAT_ID');
    }



    public function joueurs()
    {
        return $this->belongsToMany(Joueur::class, 'POSSEDE_CAPACITE', 'COMPETENCE_ID', 'USER_ID')
            ->withPivot('Niveau'); // Si vous avez besoin d'accéder aux colonnes supplémentaires de la table pivot
    }
}
