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
        $sneakers = Sneaker::orderBy('created_at', 'desc')->take(10)->get();
        $marques = Marque::orderBy('name', 'desc')->get();
        //retourner tout les produits
        return view('welcome', compact('sneakers', 'marques'));
    }
}
