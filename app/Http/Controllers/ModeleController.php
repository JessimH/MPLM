<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
use App\Models\Marque;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marques = Marque::get();

        return view('addModele', compact('marques'));
        //
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
            'marque' => 'required'
        ]);

        $marque_id = intval($request['marque']);

        $modele = new Modele;
        $modele->name = $request['name'];
        $modele->marques_id = $marque_id;
    
        // $marque = Marque::where('id', $marque_id)->get();
        // $modele->marques()->associate($marque);
        $modele->save();

        return redirect('/admin/modeles')
                ->with('success','Votre modèle à bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $modele = Modele::where('id', $id)->first();
        $marques = Marque::orderBy('name')->get();

        // dd($modele->name);

        return view('updateModele', compact(['modele','marques']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'marque' => 'required'
        ]);

        $marque_id = intval($request['marque']);
        $modele = Modele::where('id', $id)->first();
        $modele->name = $request->name;
        $modele->marques_id = $marque_id;
        $modele->save();
        
        return redirect('/admin/modeles')
                ->with('success','Votre modèle à bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modeleToDelete = Modele::where('id', $id)->get();

        if(count($modeleToDelete)>0){
            Modele::where('id', $id )->delete();

            return redirect('/admin/modeles')->with('success','Votre modèle a bien été supprimé de la Base de données !');
        }
        else{
            return redirect('/admin/modeles')->with('error','La modèle est introuvable, contactez votre administrateur de base de données.');
        } 
        
    }
}
