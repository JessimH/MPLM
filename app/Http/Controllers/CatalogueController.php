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
        $marques = Marque::orderBy('name')->get();

        //retourner tout les produits
        return view('catalogue', compact('sneakers', 'filtre', 'marques'));   
    }

    public function search(Request $request)
    {
        $q = $request['search'];

        $sneakers = Sneaker::where('name','LIKE','%'.$q.'%')->orWhere('color','LIKE','%'.$q.'%')->get();

        if (count($sneakers) > 0) {
            $filtre = $request->search;
            $marques = Marque::orderBy('name')->get();

            return view('search', compact('sneakers', 'filtre', 'marques'));
        }

        else {
            $sneakers = Sneaker::where('bestseller', true)->get();

            $marques = Marque::orderBy('name')->get();
            //retourner tout les produits
            return view('errors.404', compact('q', 'marques'));
        }

        // dd($sneakers);
    }

    public function filter($filtre)
    {
        $marque = Marque::where('name', $filtre)->first();
        $modele = Modele::where('name', $filtre)->first();
        if($marque){
            $sneakers = Sneaker::where('marques_id', $marque->id)->get();
            $marques = Marque::orderBy('name')->get();
            return view('catalogue', compact('sneakers', 'filtre', 'marques'));   
        }
        elseif($modele){
            $sneakers = Sneaker::where('modeles_id', $modele->id)->get();
            $marques = Marque::orderBy('name')->get();
            return view('catalogue', compact('sneakers', 'filtre', 'marques'));   
        }
        else{
            return redirect('/')->with('error','La filtre demandé ne retourne aucun produit.');
        }
        // dd($sneakers);
        //retourner les produits avec le filtre
        
    }
}
