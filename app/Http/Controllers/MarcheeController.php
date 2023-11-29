<?php

namespace App\Http\Controllers;

use App\Models\TRANSACTION_MARCHE;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarcheeController extends Controller
{
    public function marchee(){


        $user = Auth::user();


        // Récupération des items du joueur
        $itemsDuJoueur = $user->joueur->items;

        return view("marchee.ajouter_transaction",
        [
        "itemsDuJoueur" => $itemsDuJoueur,
            ]);
    }

    public function traiterTransaction(Request $request)
    {
        $user = auth()->user();

        $user->joueur->cleanUpItems();
        // Récupération des données du formulaire
        $itemId = $request->input('item');
        $quantite = $request->input('quantity');
        $price = $request->input("price");

        // Vérification si l'item appartient au joueur
        $itemDuJoueur = $user->joueur->items->where('ID', $itemId)->first();
        if (!$itemDuJoueur || $itemDuJoueur->pivot->NB_items < $quantite) {
            return redirect()->route('ajouter_transaction')->with('error', 'Vous ne possédez pas suffisamment d\'items pour cette transaction.');
        }

        // Soustraction de la quantité d'item du joueur
        $itemDuJoueur->pivot->NB_items -= $quantite;
        $user->joueur->items()->updateExistingPivot($itemId, ['NB_items' => $itemDuJoueur->pivot->NB_items]);


        $lastId = TRANSACTION_MARCHE::max('ID');
        $newId = $lastId + 1;
        // Création de la transaction
        $transaction = new TRANSACTION_MARCHE();
        $transaction->ID = $newId;
        $transaction->Statut = 'En cours';
        $transaction->DT_CREATION = Carbon::now();
        $transaction->DT_END = null; // Mettez votre logique pour la date de fin si nécessaire
        $transaction->ITEM_QT = $quantite;
        $transaction->ITEM_ID = $itemId;
        $transaction->PIECE_QT = $price; // Exemple pour simplifier, à ajuster selon votre logique
        $transaction->USER1_ID = $user->joueur->ID;
        $transaction->save();

        // Redirection vers la page d'offre avec l'ID de la transaction
        return redirect()->route("offre_marche", ['ID' => $transaction->ID])->with("success", "Votre offre a été publiée sur le marché");
    }

    public function afficherOffreMarche(Request $request,$ID)
    {

        $transaction = TRANSACTION_MARCHE::find($ID);

        // Vérifie si la transaction existe
        if (!$transaction) {
            return redirect()->route("home")->with('error', 'La transaction spécifiée n\'existe pas.');
        }

        // Mettez en place votre logique pour afficher la transaction sur la page correspondante
        // Par exemple :
        return view('marchee.offre_marche', [
            "transaction" => $transaction,
        ]);
    }

}
