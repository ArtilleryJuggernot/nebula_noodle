<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            // Récupérer le joueur associé à l'utilisateur
            //DB::enableQueryLog();
            $joueur = $user->joueur;
            //$query = DB::getQueryLog();
            $joueur->LVL +=1; // Affectation du nouveau grade
            $joueur->COINS += 50;
            $joueur->save(); // Sauvegarde des modifications

        }

        return view('home');
    }
}
