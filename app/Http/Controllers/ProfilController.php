<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ITEM_CAT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profilJoueur(Request $request, $ID){

        // Si un ID est en paramètre


        /*if ($request->input("id")){
            $user = User::find($request->get("id"));
        }

        // Sinon on considère ID du joueur
        else{
            $user = Auth::user();
        }
        */
        $user = User::find($ID);

        // joueur introuvable
        if(!$user){
            return redirect()->route("home")->with('error', 'Le profil du joueur demandé est inexistant');
        }
        // Clean up des items = 0
        $user->joueur->cleanUpItems();

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
