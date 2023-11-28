<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Competence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoutiqueController extends Controller
{


    public function boutique()
    {
        // Sélection aléatoire de 4 items de chaque catégorie et 4 compétences
        $itemsOffreSpeciale = Item::inRandomOrder()->limit(4)->get();
        $competencesOffreSpeciale = Competence::inRandomOrder()->limit(4)->get();



        return view('boutique.boutique', compact('itemsOffreSpeciale', 'competencesOffreSpeciale'));
    }

    public function acheterItem(Request $request){
        $itemId = $request->get("item"); // Récupère la valeur de 'item' dans la requête
        $item = Item::find($itemId);
        $joueur = Auth::user()->joueur;
        // Fond nécessaire
        if($joueur->COINS >= $item->INITIAL_PRICE){
            $joueur->COINS -= $item->INITIAL_PRICE;
            $joueur->save();
            // Contient déjà l'item
            if($joueur->items->contains($itemId)){
                $joueur->items()->updateExistingPivot($itemId, ['NB_items' => DB::raw('NB_items + 1')]);
            }
            else {
                $joueur->items()->attach($itemId, ['NB_items' => 1]);
            }
        }
        return redirect()->route('boutique')->with('success', 'L\'achat a été effectué avec succès !');

    }

    public function acheterCompetence(Request $request) {
        // Obtenir l'ID de la compétence à acheter depuis la requête
        $competenceId = $request->get("competence");

        // Récupérer la compétence correspondante à l'ID
        //$competence = Competence::findOrFail($competenceId);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        if ($user) {
            // Récupérer le joueur associé à l'utilisateur
            $joueur = $user->joueur;

            if ($joueur) {
                // Vérifier si le joueur a déjà cette compétence
                $possedeCapacite = $joueur->competences()->where('COMPETENCE_ID', $competenceId)->first();

                if (!$possedeCapacite) {
                    // Si le joueur ne possède pas déjà cette compétence, l'ajouter avec un niveau de 1

                    //DB::enableQueryLog();
                    //dd($competenceId);
                    $joueur->competences()->attach($competenceId, ['Niveau' => 1]);

                    //$queries = DB::getQueryLog();
                    //dd($queries);
                    return redirect()->route('boutique')->with('success', 'Compétence achetée avec succès !');
                } else {
                    // Si le joueur possède déjà cette compétence, augmenter son niveau

                    $joueur->competences()->updateExistingPivot($competenceId, ['Niveau' => DB::raw('Niveau + 1')]);

                    return redirect()->route('boutique')->with('success', 'Niveau de la compétence augmenté avec succès !');
                }
            }
        }

        return redirect()->route('boutique')->with('error', 'Une erreur est survenue lors de l\'achat.');
    }



}
