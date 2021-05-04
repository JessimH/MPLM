<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;
use App\Models\Marque;
class WelcomeController extends Controller
{
    //
    public function index()
    {
        $sneakers = Sneaker::where('bestseller', true)->get();

        $marques = Marque::orderBy('name')->get();
        //retourner tout les produits
        return view('welcome', compact('sneakers', 'marques'));
    }
}
