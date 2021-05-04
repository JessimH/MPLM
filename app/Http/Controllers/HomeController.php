<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modele;
use App\Models\Marque;
use App\Models\Sneaker;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $modeles = Modele::get();
        $sneakers = Sneaker::get();
        $marques = Marque::get();

        return view('home', compact(['modeles', 'sneakers', 'marques']));
    }

    public function marques()
    {
        $modeles = Modele::get();
        $sneakers = Sneaker::get();
        $marques = Marque::get();

        return view('adminMarques', compact(['modeles', 'sneakers', 'marques']));
    }

    public function modeles()
    {
        $modeles = Modele::get();
        $sneakers = Sneaker::get();
        $marques = Marque::get();

        return view('adminModeles', compact(['modeles', 'sneakers', 'marques']));
    }

    public function sneakers()
    {
        $modeles = Modele::get();
        $sneakers = Sneaker::get();
        $marques = Marque::get();

        return view('adminSneakers', compact(['modeles', 'sneakers', 'marques']));
    }
}
