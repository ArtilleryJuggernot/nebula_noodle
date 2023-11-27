<?php

namespace App\Http\Controllers;
use App\Models\User;
use Laravel\Fortify\Contracts\DeletesUsers;
use Illuminate\Http\Request;

class UtilsDev extends Controller
{
    public function clearAll(Request $request){

        $users = User::all();

// Parcourir tous les utilisateurs et supprimer chaque utilisateur avec son joueur associé
        foreach ($users as $user) {
            $user->deleteWithJoueur();
        }

    }
}
