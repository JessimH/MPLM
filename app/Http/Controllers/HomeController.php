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
        $modeles = Modele::orderBy('name')->get();
        $sneakers = Sneaker::orderBy('name')->get();
        $marques = Marque::orderBy('name')->get();

        return view('home', compact(['modeles', 'sneakers', 'marques']));
    }

    public function marques()
    {
        $modeles = Modele::orderBy('name')->get();
        $sneakers = Sneaker::orderBy('name')->get();
        $marques = Marque::orderBy('name')->get();

        return view('adminMarques', compact(['modeles', 'sneakers', 'marques']));
    }

    public function modeles()
    {
        $modeles = Modele::orderBy('name')->get();
        $sneakers = Sneaker::orderBy('name')->get();
        $marques = Marque::orderBy('name')->get();

        return view('adminModeles', compact(['modeles', 'sneakers', 'marques']));
    }

    public function sneakers()
    {
        $modeles = Modele::orderBy('name')->get();
        $sneakers = Sneaker::orderBy('name')->get();
        $marques = Marque::orderBy('name')->get();

        return view('adminSneakers', compact(['modeles', 'sneakers', 'marques']));
    }

    public function bestseller($id)
    {
        $sneaker = Sneaker::where('id', $id)
                        ->first();

        $sneaker->bestseller = !$sneaker->bestseller;
        $sneaker->save();

        return redirect('/dashboard')
                ->with('success','Votre Sneaker à bien été ajouté aux best sellers.');
    }
}
