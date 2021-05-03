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
        $sneakers = Sneaker::get();
        //retourner tout les produits
        return view('catalogue', compact('sneakers'));   
    }

    public function filter($filtre)
    {
        $sneakers = Sneaker::get();
        //retourner les produits avec le filtre
        return view('catalogue', compact('sneakers'));   
    }
}
