<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $sneakers = Sneaker::orderBy('created_at', 'desc')->take(10)->get();
        //retourner tout les produits
        return view('welcome', compact('sneakers'));
    }
}
