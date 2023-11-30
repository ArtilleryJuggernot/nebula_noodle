<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use App\Models\LOGS;
use App\Models\User;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function filterLogs(Request $request)
    {
        $dateFilter = $request->input('date_filter');
        $userID = $request->input('user_id');
        $actionFilter = $request->input('action_filter');

        // Filtre des logs en fonction des paramètres
        $query = LOGS::query();

        if ($dateFilter === '1') {
            $query->orderByDesc('DATE');
        }

        if ($userID) {
            $query->where('USER_ID', $userID);
        }

        if ($actionFilter) {
            $query->where('ACTION', $actionFilter);
        }

        // Récupération des logs filtrés
        $filteredLogs = $query->get();

        // Charger les actions disponibles pour les options du filtre d'action
        $actions = LOGS::select('ACTION')->distinct()->get();

        return view('admin.logs', compact('filteredLogs', 'actions'));
    }

    public function playersList()
    {
        $players = Joueur::where('ROLE', "Joueur")->get();

        return view('admin.playersinfo', ['players' => $players]);
    }

    public function banPlayer($id)
    {
        $player = User::findOrFail($id);
        $player->is_ban = !$player->is_ban; // Inverse l'état de bannissement
        $player->save();

        // Banissement
        if($player->is_ban == 1){
            return redirect()->route('playersList')->with('success', 'Action de bannissement effectuée avec succès.');
        }
        // Unban
        return redirect()->route('playersList')->with('success', 'Action de débannissement effectuée avec succès.');


    }
}
