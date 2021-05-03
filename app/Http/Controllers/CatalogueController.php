<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    //
    public function index()
    {
        //retourner tout les produits
        return view('catalogue');   
    }

    public function filter($filtre)
    {
        //retourner les produits avec le filtre
        return view('catalogue', compact('filtre'));   
    }
}
