<?php

namespace App\Http\Controllers;

use App\Models\maj;
use Illuminate\Http\Request;
class MAJController extends Controller
{
    public function index()
    {
        $misesAJour = maj::orderBy('DT_CREATE', 'desc')->paginate(3);

        return view('accueil.maj', compact('misesAJour'));
    }
}
