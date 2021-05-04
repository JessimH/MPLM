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
        $sneakers = Sneaker::orderBy('name')->get();
        $filtre = false;
        $marques = Marque::orderBy('name', 'desc')->get();

        //retourner tout les produits
        return view('catalogue', compact('sneakers', 'filtre', 'marques'));   
    }

    public function filter($filtre)
    {
        $marque = Marque::where('name', $filtre)->first();
        $modele = Modele::where('name', $filtre)->first();
        if($marque){
            $sneakers = Sneaker::where('marques_id', $marque->id)->get();
            $marques = Marque::orderBy('name', 'desc')->get();
            return view('catalogue', compact('sneakers', 'filtre', 'marques'));   
        }
        elseif($modele){
            $sneakers = Sneaker::where('modeles_id', $modele->id)->get();
            $marques = Marque::orderBy('name', 'desc')->get();
            return view('catalogue', compact('sneakers', 'filtre', 'marques'));   
        }
        else{
            return redirect('/')->with('error','La filtre demandé ne retourne aucun produit.');
        }
        // dd($sneakers);
        //retourner les produits avec le filtre
        
    }
}
