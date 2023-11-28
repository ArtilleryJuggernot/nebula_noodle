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
            $joueur = $user->joueur;

            DB::enableQueryLog();
            $joueur->LVL +=1; // Affectation du nouveau grade
            $joueur->save(); // Sauvegarde des modifications


        }

        return view('home');
    }
}
