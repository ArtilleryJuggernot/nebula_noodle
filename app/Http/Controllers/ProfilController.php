<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ITEM_CAT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


    public function editProfile()
    {
        if(!Auth::user())
            return view("home")->with("error","Vous n'êtes pas connecté !");

        $joueur = Auth::user()->joueur;
        return view('profil.edit_profile', [
            "joueur" => $joueur
        ]);
    }



    public function updateProfile(Request $request)
    {
        if(!Auth::user())
            return view("home")->with("error","Vous n'êtes pas connecté !");

        $joueur = Auth::user()->joueur;

        Auth::user()->name = $request->username;
        $joueur->GRADE = $request->grade;
        $joueur->save();
        Auth::user()->save();

        return redirect()->route('profile',["ID" => Auth::user()->joueur->ID])->with('success', 'Profil mis à jour avec succès');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route("profile",["ID" => Auth::user()->joueur->ID])->with('error', 'Ancien mot de passe incorrect');
        }

        $user->password = Hash::make($request->new_password);
        Auth::user()->save();

        return redirect()->route('profile',["ID" => Auth::user()->joueur->ID])->with('success', 'Mot de passe mis à jour avec succès');
    }
}
