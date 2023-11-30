<?php

namespace App\Http\Controllers;

use App\Models\LOGS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
{
    public static function logAction($action, $content)
    {
        $log = new LOGS();
        $log->ID = LOGS::max('ID') + 1;
        $log->DATE = now(); // Date actuelle
        $log->USER_ID = Auth::id(); // ID de l'utilisateur actuel
        $log->ACTION = $action;
        $log->CONTENU = $content;
        $log->save();
    }
}
