<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;
use App\Models\Marque;
class NopeController extends Controller
{
    //
    public function index()
    {
        $marques = Marque::orderBy('name', 'desc')->get();
        //retourner tout les produits
        return view('404', compact('marques'));
    }
}
