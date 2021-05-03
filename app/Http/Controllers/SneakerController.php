<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use Illuminate\Http\Request;

class SneakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //retourner la snkrs avec le bon id
        return view('sneaker'); 
    }

    public function color(Request $request)
    {
        //retourner la snkrs avec la bonne couleur du form ET le bon nom
        return view('sneaker'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addSneaker'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'marque' => 'required'
        ]);

        $marque_id = intval($request['marque']);

        $sneaker = new Sneaker();
        $sneaker->name = $request['name'];
        $sneaker->marques_id = $marque_id;
    
        $sneaker->save();

        return redirect('/dashboard')
                ->with('success','Votre modèle à bien été créée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function show(Sneaker $sneakers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function edit(Sneaker $sneakers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sneaker $sneakers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sneaker $sneakers)
    {
        //
    }
}
