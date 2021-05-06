<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;
use App\Models\Marque;
use App\Models\Modele;
class WelcomeController extends Controller
{
    //
    public function index()
    {
        $sneakers = Sneaker::where('bestseller', true)->get();

        $marques = Marque::orderBy('name')->get();
        $modeles = Modele::orderBy('name')->get();
        //retourner tout les produits
        return view('welcome', compact('sneakers', 'marques', 'modeles'));
    }
}
