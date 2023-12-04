<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse;

class JoueurController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            // Définir ici les règles de validation pour l'enregistrement de l'utilisateur
        ]);

        $user = $this->creator->create($request->all());

        // Créer l'instance Joueur correspondant à cet utilisateur
        $joueur = new Joueur([
            'ID' => $user->id,
            'GRADE' => '', // Chaîne vide comme spécifié
            'LVL' => 1,
            'COINS' => 100,
            'user_id' => $user->id
        ]);

        // Associer le joueur à l'utilisateur
        $user->joueur->save($joueur);

        LogsController::logAction("REGISTER","Enregistrement d'un nouveau joueur : " . $user->name . " avec l'identifiant " . $user->ID);

        return app(RegisterResponse::class);
    }
}
