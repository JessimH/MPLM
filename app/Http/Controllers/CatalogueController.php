<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;
use App\Models\Modele;
use App\Models\File;
use App\Models\Marque;

class CatalogueController extends Controller
{
    //
    public function index()
    {
        $sneakers = Sneaker::orderBy('name')->paginate(36);
        $filtre = false;
        //retourner tout les produits
        return view('catalogue', compact('sneakers', 'filtre'));   
    }

    public function filter($filtre)
    {
        $sneakers = Sneaker::orderBy('name')->paginate(36);
        //retourner les produits avec le filtre
        return view('catalogue', compact('sneakers', 'filtre'));   
    }
}
