<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Competence;
class BoutiqueController extends Controller
{


    public function boutique()
    {
        // Sélection aléatoire de 4 items de chaque catégorie et 4 compétences
        $itemsOffreSpeciale = Item::inRandomOrder()->limit(4)->get();
        $competencesOffreSpeciale = Competence::inRandomOrder()->limit(4)->get();



        return view('boutique.boutique', compact('itemsOffreSpeciale', 'competencesOffreSpeciale'));
    }

}
