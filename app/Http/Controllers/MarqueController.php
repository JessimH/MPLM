<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;





class MarqueController extends Controller
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
        return view('addMarque'); 
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
        Marque::create($validatedAttributes = request()->validate([
            'name' => 'required'
        ]));
        return redirect('/admin/marques')
                ->with('success','Votre marque à bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $marque = Marque::where('id', $id)->first();
        // dd($marque);
        return view('updateMarque', compact('marque')); 
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
        ]);

        // dd($id);
        $marque = Marque::where('id', $id)->first();
        $marque->name = $request->name;
        $marque->save();

        return redirect('/admin/marques')
                ->with('success','Votre marque à bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marqueToDelete = Marque::where('id', $id)->get();

        if(count($marqueToDelete)>0){
            Marque::where('id', $id )->delete();

            return redirect('/admin/marques')->with('success','Votre marque a bien été suprimé de la Base de données !');
        }
        else{
            return redirect('/admin/marques')->with('error','La marque est introuvable, contactez votre administrateur de base de données.');
        } 
        
    }
}
