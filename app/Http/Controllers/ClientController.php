<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function logout(Request $request) {
        $name = Auth::user()->name;
        Auth::logout();
        LogsController::logAction("LOGOUT","Déconnexion du joueur ". $name);
        return redirect('/login')->with(['msg_body' => 'Deconnexion réussie !']);
    }



}
