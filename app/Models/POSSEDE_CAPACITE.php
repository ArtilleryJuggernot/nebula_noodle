<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSSEDE_CAPACITE extends Model
{
    use HasFactory;
    protected $table = 'POSSEDE_CAPACITE';
    protected $primaryKey = ['USER_ID', 'COMPETENCE_ID'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['USER_ID', 'COMPETENCE_ID', 'Niveau'];

    // Définir les relations avec le modèle Joueur et Compétence
    public function joueur()
    {
        return $this->belongsTo(Joueur::class, 'USER_ID', 'ID');
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class, 'COMPETENCE_ID', 'ID');
    }

}
