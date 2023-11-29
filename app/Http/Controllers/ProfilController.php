<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ITEM_CAT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profilJoueur(Request $request){

        // Si un ID est en paramètre

        if ($request->get("id")){
            $user = User::find($request->get("id"));
        }
        // Sinon on considère ID du joueur
        else{
            $user = Auth::user();
        }

        // Envoyez les données de Item CAT

        $itemsByCategory = $user->joueur->items()->with('categorie')->get()->groupBy('categorie.LIBELLE');

        $competencesByClasse = $user->joueur->competences()
            ->with('categorie')
            ->get()
            ->groupBy('categorie.CAT_LIBELLE');
        return view("profil.profil",
            ["user" => $user,
                "itemsByCategory" => $itemsByCategory,
                "competencesByClasse" => $competencesByClasse,
            ]);
    }
}
