<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    protected $fillable = ["ID",'GRADE', 'LVL', 'COINS','ROLE'];
    protected $table = 'JOUEUR';
    protected $primaryKey = "ID";
    public $timestamps = false; //by default timestamp true
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function isAdmin() : bool{
        return $this->ROLE == "Admin";
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'POSSEDE_ITEMS', 'USER_ID', 'ITEM_ID')
            ->withPivot('NB_items');
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'POSSEDE_CAPACITE', 'USER_ID', 'COMPETENCE_ID')
            ->withPivot('Niveau'); // Si vous avez besoin d'accéder aux colonnes supplémentaires de la table pivot
    }
}
