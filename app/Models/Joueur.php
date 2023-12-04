<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Joueur extends Model
{
    protected $fillable = ["ID",'GRADE', 'LVL', 'COINS','ROLE',"user_id"];
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

    public function cleanUpItems()
    {
        $this->items()->wherePivot('NB_items', 0)->detach();
    }

    public function classePredilection() : string
    {
        $joueur = Auth::user()->joueur;
        $competences = $joueur->competences()->with('categorie')->get();

        $classePredilection = $competences->groupBy('categorie.CAT_LIBELLE')
            ->map->count()
            ->sortDesc()
            ->keys()
            ->first();

        if ($classePredilection == null){
            $classePredilection = "Pas encore assez de sort";
        }
        return $classePredilection;
    }
}
