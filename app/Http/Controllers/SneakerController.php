<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use App\Models\Modele;
use App\Models\File;
use App\Models\Marque;
use Illuminate\Database\Eloquent\Model;
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
        $sneaker = Sneaker::where('id', $id)
                        ->first();
        $result = $sneaker;
        $result_images = rtrim($result->filenames, ' ]');
        $result_images = substr($result_images, 1);
        $result_images = explode(",", $result_images);
        $images = [];
        foreach ($result_images as $image){
            $image = rtrim($image, '"');
            $image = substr($image, 1);
            array_push($images, $image);
        }
        // $images = $result->filenames;
        // dd($images);
        return view('sneaker', compact('sneaker', 'images'));
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
        $modeles = Modele::get();
        $sneakers = Sneaker::get();
        $marques = Marque::get();

        return view('addSneaker', compact(['modeles', 'sneakers', 'marques']));
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
            'modele' => 'required',
            'marque' => 'required',
            'filenames' => 'required',
            'filenames.*' => 'mimes:png,jpeg,jpg,svg'
        ]);

        $marque_id = intval($request['marque']);
        $modele_id = intval($request['marque']);

        $sneaker = new Sneaker();
        $sneaker->name = $request['name'];
        $sneaker->color = $request['color'];
        $sneaker->marques_id = $marque_id;
        $sneaker->modeles_id = $modele_id;
    
        $sneaker->save();

        $dernierSneaker = Sneaker::latest()->first();

        $i = 0;
        $id = $dernierSneaker->id;
        foreach ($request->file('filenames') as $file) {
            $name = $dernierSneaker['id'].$i.'.'.$file->extension();
            $file->move(public_path().'/images/', $name);
            $data[] = $name;
            $i += 1;
        }

        $updateSneaker = Sneaker::where('id', $id)
                        ->first(); // this point is the most important to change
        $updateSneaker->filenames = $data;
        $updateSneaker->save();

        $file= new File();
        $file->filenames=json_encode($data);
        $file->save();

        return redirect('/dashboard')
                ->with('success','Votre Sneaker à bien été ajouté.');
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
    public function destroy($id)
    {
        $snkrToDelete = Sneaker::where('id', $id)->get();

        if(count($snkrToDelete)>0){
            Sneaker::where('id', $id )->delete();

            return redirect('/dashboard')->with('success','Votre Sneaker a bien été suprimé de la Base de données !');
        }
        else{
            return redirect('/dashboard')->with('error','La sneaker est introuvable, contactez votre administrateur de base de données.');
        } 
        
    }
}
